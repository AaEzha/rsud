      <?=$this->session->flashdata('name');?>
      <div class="flex">
        <div class="f-col-3 f-float-round pad-lg">
          <div class="image-round">
            <label class="profil-init"><?=inisialNama($this->session->nama);?></label>
            <img src="" alt="">
          </div>
          <div class="bg-profil"></div>
        </div>
        <div class="f-col-7 f-float-round pad-sm">
          <div class="label">
            <div class="header">Nama</div>
            <div class="desc-clr"><?=$data->name;?></div>
          </div>
          <div class="label">
            <div class="header">Posisi</div>
            <div class="desc-clr"><?=$this->session->role;?> <?=$this->session->unit;?></div>
          </div>
          <div class="label">
            <div class="header">Status</div>
            <!-- <div class="status bg-danger">Tidak Aktif</div> -->
            <div class="status bg-success"><?=($data->status=='1')?'Aktif':'Non-Aktif';?></div>
          </div>  
        </div>
      </div>
      <div class="flex">
        <div class="f-col">
          <div class="label">
            <div class="header">Email</div>
            <div class="desc"><?=$data->email;?></div>
          </div>
          <div class="label">
            <div class="header">No. Telp</div>
            <div class="desc"><?=$data->phone;?></div>
          </div>
        </div>
      </div>