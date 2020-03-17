      <div class="flex">
        <div class="f-col">
          <?=form_open('csunitit/profil/edit');?>
          <div class="label">
            <div class="label-header">Nama</div>
            <input type="text" class="form-control<?=(form_error('nama'))?' is-invalid':'';?>" name="nama" value="<?=$data->name;?>">
            <?=form_error('nama');?>
          </div>
          <div class="label">
            <div class="label-header">Email</div>
            <input type="text" class="form-control<?=(form_error('email'))?' is-invalid':'';?>" name="email" value="<?=$data->email;?>">
            <?=form_error('email');?>
          </div>
          <div class="label">
            <div class="label-header">Nomor Telepon</div>
            <input type="text" class="form-control<?=(form_error('phone'))?' is-invalid':'';?>" name="phone" value="<?=$data->phone;?>">
            <?=form_error('phone');?>
          </div>

          <input type="submit" class="btn btn-primary rounded mt-3 btn-lg" value="Simpan">

          <?=form_close();?>
        </div>
      </div>