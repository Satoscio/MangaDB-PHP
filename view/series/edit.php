<h3>Edit series</h3>

<form method="POST" action="index.php">
    
    <input type="hidden" name="action" value="seriesEdit" />
    <input type="hidden" name="id" value="<?= $id; ?>" />

    <table class="tableedit">

        <tr>
            <td>Title</td>
            <td><input type="text" class="addedittext" name="name" value="<?= $name; ?>"/></td>
        </tr>

        <tr>
            <td>Author</td>
            <td><input type="text" class="addedittext" name="author" value="<?= $author; ?>"/></td>
        </tr>

        <tr>
            <td>Artist (not mandatory)</td>
            <td><input type="text" class="addedittext" name="artist" value="<?= $artist; ?>"/></td>
        </tr>

        <tr>
            <td>Genre</td>
            <td><input type="text" class="addedittext" name="genre" value="<?= $genre; ?>"/></td>
        </tr>

        <tr>
            <td>Publisher</td>
            <td><input type="text" class="addedittext" name="publisher" value="<?= $publisher; ?>"/></td>
        </tr>

        <tr>
            <td>Language</td>
            <td><input type="text" class="addedittext" name="language" value="<?= $language; ?>"/></td>
        </tr>

        <tr>
            <td>Your volumes</td>
            <td><input type="number" class="addedittext" name="volnumber" value="<?= $voln; ?>"/></td>
        </tr>

        <tr>
            <td>Released volumes</td>
            <td><input type="number" class="addedittext" name="volumes" value="<?= $volumes; ?>"/></td>
        </tr>

        <tr>
            <td>Ongoing (0: no, 1: yes)</td>
            <td><input type="number" class="addedittext" name="ongoing" min="0" max="1" value="<?= $ongoing; ?>"></td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: center"><input type="submit" value="Save" class="editbutton" /></td>
        </tr>
            
    </table>

</form>