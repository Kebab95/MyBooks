<div class="row">
    <div class="col-xs-3"></div>
    <div class="col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h3>Üdvözöllek</h3>
            </div>
            <div class="panel-body">
                <?php echo (Session::issetVal("UserID")?"Bejelentkezve":"Nincs bejelentkezve")?>
            </div>
        </div>
    </div>
    <div class="col-xs-3"></div>
</div>

