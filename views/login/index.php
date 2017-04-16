<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h3><?php echo $this->loginTitle?></h3>
            </div>
            <div class="panel-body">
                <?php
                    if (isset($this->error)){
                        echo $this->error;
                    }
                ?>
                <form action="<?php echo URL?>login/loggingIn" method="post">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <strong><label>Felhasználó név</label></strong>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="loginName">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <strong><label>Jelszó</label></strong>
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-success btn-block" value="Bejelentkezés">
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>