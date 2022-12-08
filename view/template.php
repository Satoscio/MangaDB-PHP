<!DOCTYPE html>
<html>
    <head>
        <title>Library</title>
        <link href="resources/css/styles.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    </head>
    <body>
        <div>
            <h1>Library</h1>
            <?php
                $this -> attiva();
            ?>
        </div>
        <p class="return"><a href="index.php" title="Go home">Homepage</a></p>
        <footer>made by Budei Bogdan</footer>
        <script>
            function search() {
                var filter = searchBox.value.toUpperCase();
                for (var rowI = 1; rowI < trs.length; rowI++) {
                    var tds = trs[rowI].getElementsByTagName("td");
                    trs[rowI].style.display = "none";
                    for (var cellI = 0; cellI < tds.length; cellI++) {
                        if (tds[cellI].innerHTML.toUpperCase().indexOf(filter) > -1) {
                            trs[rowI].style.display = "";
                            continue;
                        }
                    }
                }
            }

            const searchBox = document.getElementById('searchInput');
            const table = document.getElementById("mangaTable");
            const trs = table.tBodies[0].getElementsByTagName("tr");

            searchBox.addEventListener('keyup', performSearch);
        </script>
    </body>
</html>