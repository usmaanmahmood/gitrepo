<button type="button" class="btn btn-default btn-block dat-reset-filters"><span class="glyphicon glyphicon-remove"></span> Reset Databases</button>

<select class="form-control" size=4 id="DatabaseList">
    <?php foreach (array_unique($arcadeProfile->getDatabaseList()) as $option) { ?>
        <option value="<?php echo $option ?>">
            <?php preg_match("/(\d+)-(\d+)-(\d)(.*)/", $option, $matches);
            $databaseParsedName = ("Year " . $matches[3] . " - " . ($matches[4] == "X" ? ("Overall (inc. Exams)") : "Coursework Only"));
            echo $databaseParsedName; ?></option>
    <?php } ?>
</select>
<br/>
<h2 class="text-center">Modules<br />
    <button type="button" class="btn btn-default btn-xs btn-warning mod-reset-filters"><span class="glyphicon glyphicon-remove"></span> Clear Selection</button></h2>


<select multiple class="form-control" size=15 id="ModuleList">
    <?php $twoDArray = $arcadeProfile->getTwoDimensionalArray();
    foreach ($twoDArray as $filter) {
        ?>
        <option value="<?php echo $filter[4] ?>" data-db="<?= $filter[0] ?>">
            <?php
            $matched = preg_match("/(\d{3,5})(\S)$/", $filter[4], $matches);

            if ($matched) {
                switch ($matches[2]) {
                    case "L":
                        $matches[2] = " Labs";
                        break;
                    case "C":
                        $matches[2] = " Coursework";
                        break;
                    case "E":
                        $matches[2] = " Examples-Classes";
                        break;
                    case "W":
                        $matches[2] = " Workshops";
                        break;
                    case "X":
                        $matches[2] = " Exams";
                        break;
                }
            };

            if ($matched)
                echo $matches[1] . $matches[2];
            else
                echo $filter[4];
            ?></option>
    <?php } ?>
</select>
<br/>
<button type="button" class="btn btn-default btn-lg btn-block" data-loading-text="Searching..."
        id="submit"><span class="glyphicon glyphicon-search"></span> Search
</button>