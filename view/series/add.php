<h3>Add new series</h3>

<form method="POST" action="index.php">

    <input type="hidden" name="action" value="seriesAdd" />
    
    <table class="tableadd">

        <tr>
            <td>Title</td>
            <td><input type="text" class="addedittext" name="name" /></td>
        </tr>

        <tr>
            <td>Author</td>
            <td><input type="text" class="addedittext" name="author" /></td>
        </tr>

        <tr>
            <td>Artist (not mandatory)</td>
            <td><input type="text" class="addedittext" name="artist" /></td>
        </tr>

        <tr>
            <td>Genre</td>
            <td><input type="text" class="addedittext" name="genre" /></td>
        </tr>

        <tr>
            <td>Publisher</td>
            <td><input type="text" class="addedittext" name="publisher" /></td>
        </tr>

        <tr>
            <td>Language</td>
            <td><input type="text" class="addedittext" name="language" /></td>
        </tr>

        <tr>
            <td>Your volumes</td>
            <td><input type="number" class="addedittext" name="volnumber" /></td>
        </tr>

        <tr>
            <td>Released volumes</td>
            <td><input type="number" class="addedittext" name="volumes" /></td>
        </tr>

        <tr>
            <td>Ongoing (0: no, 1: yes)</td>
            <td><input type="number" class="addedittext" name="ongoing" min="0" max="1" /></td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: center"><input type="submit" value="Save" class="editbutton" /></td>
        </tr>
            
    </table>

    
    
</form>