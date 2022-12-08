## Manga Library Database

This is a project I made in my last year of high school, in the hopes of it being presented at my final exam.

It was written purely with the knowledge I acquired in the programming class (that's why it sucks lol), so don't expect anything too fancy.



To run/host this, you can clone the repo via CLI or download the source code .zip via GitHub and use an Apache web server (I only ever used XAMPP sorry)

### Creating an empty database

This project uses a local SQLite database stored as `manga.db` in `/model/dbaccess/manga.db`

I recommend [SQLiteStudio](https://sqlitestudio.pl/) to create and import the SQL file (`create_db.sql`) to create a compatible database file.

1. Do Ctrl-O to open the creation dialog.
2. Click the ![Button](https://fumetteria.moe/wp-content/uploads/2022/12/button.png) button to select the directory and name of the .db file (`/model/dbaccess/manga.db`)
3. Once created, right-click on the newly created database on the left panel of SQLiteStudio and select "Execute SQL from file"
4. Select `create_db.sql`
5. Done

### Features

![Library main view](https://fumetteria.moe/wp-content/uploads/2022/12/homepage.png)
Library homepage

![Search function](https://fumetteria.moe/wp-content/uploads/2022/12/search.png)
Case insensitive search


| Add | Edit |
| --- | ---- |
| ![Add](https://fumetteria.moe/wp-content/uploads/2022/12/add.png) | ![Edit](https://fumetteria.moe/wp-content/uploads/2022/12/edit.png) |

Same page style for adding/editing

~ Bogdan Budei (Satoscio)