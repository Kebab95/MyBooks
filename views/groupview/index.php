<div class="row">
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <label>Csoport:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <select id="groupSelect" class="form-control">
                    <?php
                        foreach ($this->selectArray as $value){
                            echo "<option value='".$value["id"]."'>".$value["name"]."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Cím</th>
                    <th>Író</th>
                    <th>Kiadó</th>
                    <th>Kiadási év</th>
                    <th>Szerkesztés</th>
                    <th>Kukába helyezés</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ford</td>
                    <td>Escort</td>
                    <td>Blue</td>
                    <td>2000</td>
                    <td>2000</td>
                    <td>2000</td>
                </tr>



            </tbody>
        </table>
    </div>
</div>