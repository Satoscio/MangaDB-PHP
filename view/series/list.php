<div class="searchbar" >
    <input type="text" id="searchInput" onkeyup="search()" placeholder="Search everything...">
</div>
<div class="searchbar" >
    <button class="editbutton" onclick="window.location.href='index.php?action=seriesViewAdd';">Add Series</button>
</div>
<div class="scrollable">
    
    <table class="center" id="mangaTable">
        <tr>
            <th width="25%">Title</th>
            <th width="14%">Author</th>
            <th width="14%">Artist</th>
            <th width="8%">Genre</th>
            <th width="9%">Publisher</th>
            <th width="6%">Language</th>
            <th width="6%">Volumes (yours)</th>
            <th width="6%">Volumes (released)</th>
            <th width="6%">Ongoing</th>
            <th colspan="2" width="6%">Actions</th>
        </tr>
        <?php
            $serieslist = $this -> seriesObj -> readAll();
            $volumeslist = $this -> volumesObj -> readAll();
            foreach($serieslist as $index=>$r) {
                $ong = "";
                if($r -> ongoing == 1) {
                    $ong = "Yes";
                } else {
                    $ong = "No";
                }
        ?>
                <tr>
                    <td><?= $r -> name; ?></td>
                    <td><?= $r -> author; ?></td>
                    <td><?= $r -> artist; ?></td>
                    <td><?= $r -> genre; ?></td>
                    <td><?= $r -> publisher; ?></td>
                    <td><?= $r -> language; ?></td>
                    <td><?= $volumeslist[$index] -> volnumber; ?></td>
                    <td><?= $r -> volumes; ?></td>
                    <td><?= $ong; ?></td>
                    
                    <td>
                        <a href="index.php?action=seriesViewEdit&id=<?=$r->id;?>&name=<?=$r->name;?>&author=<?=$r->author;?>&artist=<?=$r->artist;?>&genre=<?=$r->genre;?>&publisher=<?=$r->publisher;?>&language=<?=$r->language;?>&volnumber=<?=$volumeslist[$index]->volnumber;?>&volumes=<?=$r->volumes;?>&ongoing=<?=$r->ongoing;?>">
                            <span class="material-icons">edit</span>
                        </a>
                    </td>

                    <td>
                        <a href="index.php?action=seriesDelete&id=<?= $r ->id;?>">
                            <span class="material-icons">delete_forever</span>
                        </a>
                    </td>

                </tr>
                <?php    
            }
        ?>
            
    </table>

</div>    
