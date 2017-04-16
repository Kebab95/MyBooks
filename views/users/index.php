<div class="row form-group">
    <div class="col-md-2"></div>
    <div class="col-md-6" id="newUserModel"></div>
    <div class="col-md-4">
        <button type="button" class="btn btn-default btn-block" id="loadNewUserModel">Új felhasználó hozzáadása</button>
    </div>
</div>
<div class="row form-group">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->pageName?>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <?php
                    foreach ($this->tableHead as $th){
                        echo "<td><strong>".$th."</strong></td>";
                    }
                    ?>
                </tr>
                </thead>
                <tbody id="tableBody"></tbody>
            </table>
        </div>
    </div>
</div>