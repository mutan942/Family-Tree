<form action="<?=base_url("welcome/saveorang");?>" method="POST">
    <input type="hidden" name="parent" value="<?=$parent?>">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label><br>
        <input type="radio" name="jeniskelamin" value="Laki laki"> Laki laki <br><input type="radio" name="jeniskelamin"
            value="Perempuan"> Perempuan
    </div>
    <input type="submit" class="btn btn-primary" />
</form>