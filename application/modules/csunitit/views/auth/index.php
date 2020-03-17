<?=$this->session->flashdata('name');?>
<?=validation_errors('<div class="alert alert-danger" role="alert">', '</div>');;?>

<h3 class="text-left">Login CS Unit IT</h3>
          <small class="text-left">Enter your username and password to be able to log in to the RSUD Sidoarjo Service Management Application</small>
    
          <?=form_open('csunitit/auth');?>
            <div class="input-group mb-3 mt-4">
              <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <p class="mb-3">
              <a class="text-info" href="<?=base_url('csunitit/auth/lupa');?>">I forgot my password</a>
            </p>
            <div class="row mt-5">
              <div class="col-12">
                <button type="submit" class="btn btn-info btn-block mt-4">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

