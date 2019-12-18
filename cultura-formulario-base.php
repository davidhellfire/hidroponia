<div class="container-fluid">
   <div class="row">
    <div class="col-md-12">
      <div class="form-group">

       <label for="colFormLabel">
        Cultura Nome
      </label>
      <input type="text" class="form-control" name="nome" value="<?=$cultura['nome']?>" required />
    </div>
    <div class="form-group">

     <label for="colFormLabel">
      Descrição
    </label>
    <input type="text" class="form-control" name="descr" value="<?=$cultura['descr']?>" required/>
  </div>
  <div class="form-group">

   <label for="colFormLabel">
    Semanas de cultivo
  </label>
  <input type="number" class="form-control" name="semanas" value="<?=$cultura['semanas']?>" min="1" max="52" required/>
  </div>

<!--<div class="form-group">

 <label for="exampleInputFile">
  Imagem
</label>
<input type="file" class="form-control-file" id="exampleInputFile" name="imagem" accept="image/jpg">
<p class="help-block">
  Inserir imagem da cultura
</p>
</div>-->
