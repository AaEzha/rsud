      <div class="flex">
        <div class="f-col">
          <?=form_open('csunitit/profil/password');?>
          <div class="label">
            <div class="label-header">Password</div>
            <input type="password" class="form-control<?=(form_error('password'))?' is-invalid':'';?>" name="password" value="<?=set_value('password');?>">
            <?=form_error('password');?>
          </div>
          <div class="label">
            <div class="label-header">Konfirmasi Password</div>
            <input type="password" class="form-control<?=(form_error('passkonf'))?' is-invalid':'';?>" name="passkonf" value="">
            <?=form_error('passkonf');?>
          </div>

          <input type="submit" class="btn btn-primary rounded mt-3 btn-lg" value="Simpan">

          <?=form_close();?>
        </div>
      </div>