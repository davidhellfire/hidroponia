//Programa : Arduino Ethernet Shield W5100 e HC-SR04
//Alteracoes e adaptacoes : FILIPEFLOP
//
//Baseado no programa exemplo de
//by David A. Mellis e Tom Igoe


#include "DHT.h"
#include <SPI.h>
#include <Ethernet.h>

#define DHTPIN A1 // pino que sensor umidade temperatura
#define DHTTYPE DHT11 // DHT 11
#define EAPOT A0//define entrada analogica A0 para sensor de ph
#define EAUS A2//define entrada analogica A0 para sensor de US
// Conecte pino 1 do sensor (esquerda) ao +5V
// Conecte pino 2 do sensor ao pino de dados definido em seu Arduino
// Conecte pino 4 do sensor ao GND
// Conecte o resistor de 10K entre pin 2 (dados)
// e ao pino 1 (VCC) do sensor
DHT dht(DHTPIN, DHTTYPE);


int valorpot = 0;//leitura pH
int valorUS = 0;//leitura US
float mapvalor = 0.00;
//Definicoes de IP, mascara de rede e gateway
byte mac[] = {
  0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED
};
IPAddress ip(192, 168, 1, 88);       //Define o endereco IP
IPAddress gateway(192, 168, 1, 1);  //Define o gateway
IPAddress subnet(255, 255, 255, 0); //Define a máscara de rede

//Inicializa o servidor web na porta 80
EthernetServer server(80);

void setup()
{
  Serial.begin(9600);
  Serial.println("DHTxx test!");
  dht.begin();
  //Inicializa a interface de rede
  Ethernet.begin(mac, ip, gateway, subnet);
  server.begin();
}

void loop() {
  //faz leitura pino A0
  valorpot = analogRead(EAPOT);
  
  //faz leitura pino A2
  valorUS = analogRead(EAUS);
  Serial.print("US:");
  Serial.println(valorUS);
  
  //escalonamento valor digitalizado da entrada analogica para faixa dejesada
  mapvalor = map(valorpot,0 , 1023, 0.00, 15.00);//zero a 14 faixa de medicao phgametro
  Serial.print("pH:");
  Serial.println(mapvalor);
  // A leitura da temperatura e umidade pode levar 250ms!
  // O atraso do sensor pode chegar a 2 segundos.
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  // testa se retorno é valido, caso contrário algo está errado.
  if (isnan(t) || isnan(h))
  {
    Serial.println("Failed to read from DHT");
  }
  else
  {
    Serial.print("Umidade: ");
    Serial.print(h);
    Serial.print(" %");
    Serial.print("Temperatura: ");
    Serial.print(t);
    Serial.println(" *C");
  }
  
  //Aguarda conexao do browser
  EthernetClient client = server.available();
  if (client) {
    Serial.println("new client");
    // an http request ends with a blank line
    boolean currentLineIsBlank = true;
    while (client.connected()) {
      if (client.available()) {
        char c = client.read();
        Serial.write(c);
        // if you've gotten to the end of the line (received a newline
        // character) and the line is blank, the http request has ended,
        // so you can send a reply
        if (c == 'n' && currentLineIsBlank) {
          //prepara dados na String para mandar via URL
          String dadosURL;
          dadosURL.concat("<meta http-equiv='refresh' content=150;url='http://127.0.0.1/teste_botstrap/rotina.php?");
          dadosURL.concat("ph=");
          dadosURL.concat(mapvalor);
          dadosURL.concat("&umi=");
          dadosURL.concat(h);
          dadosURL.concat("&temp=");
          dadosURL.concat(t);
          dadosURL.concat("&us=");
          dadosURL.concat(valorUS);
          dadosURL.concat("'>");
          Serial.println(dadosURL);
          // send a standard http response header
          client.println("HTTP/1.1 200 OK");
          client.println("Content-Type: text/html");
          client.println("Connection: close");
          //client.println("Refresh: 15"); //Recarrega a pagina a cada 2seg
          client.println();
          client.println("<!DOCTYPE HTML>");
          client.println("<html>");
          client.println("<title>Arduino Servidor </title>");
          //criar atualizacao e redirecionamento para pagina rotina.php, enviando dados via GET na URL
          client.println("<head>");
          client.println(dadosURL);
          client.println("</head>");
          //Configura o texto e imprime o titulo no browser
          client.print("<font color=#FF0000><b><u>");
          client.print("Envio de informacoes pela rede utilizando Arduino");
          client.print("</u></b></font>");
          client.println("<br />");
          client.println("<br />");
          //Mostra as informacoes lidas pelo sensor temperatura e umidade
          client.print("<form method='post' action='http://127.0.0.1/teste_botstrap/rotina.php'>");//envia dados via POST no formulario ao pressionar button
          client.print("Sensor pH : ");
          client.print("<b>");
          client.print("<input type='text' name='ph' size='4' readonly value='");
          client.print(mapvalor);
          client.print("'>");
          client.print("pH");
          client.println("</b></br>");
          client.print("Sensor uS : ");
          client.print("<b>");
          client.print("<input type='text' name='us' size='4' readonly value='");
          client.print(valorUS);
          client.print("'>");
          client.print("uS");
          client.println("</b></br>");
          client.print("Sensor Umidade : ");
          client.print("<b>");
          client.print("<input type='text' name='umi' size='4' readonly value='");
          client.print(h);
          client.print("'>");
          client.print("%");
          client.println("</b></br>");
          client.print("Sensor de Temperatura : ");
          client.print("<b>");
          client.print("<input type='text' name='temp' size='4' readonly value='");
          client.print(t);
          client.print("'>");
          client.print("C");
          client.print("</b> ");
          client.print("<button type='submit'>Salvar</button></form>");
        
          client.println("</html>");
          break;
        }
        if (c == 'n') {
          // you're starting a new line
          currentLineIsBlank = true;
        }
        else if (c != 'r') {
          // you've gotten a character on the current line
          currentLineIsBlank = false;
        }
      }
    }
    // give the web browser time to receive the data
    delay(1);
    // close the connection:
    client.stop();
  }
}
