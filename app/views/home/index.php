<h1>Hello</h1>
<a href="/public/home/add" style="color: red">Add</a>
<?php
foreach ($users as $value) {
    echo "<p><a href='/public/home/delete/{$value['id']}'>X - {$value['id']}</a></p>";
}
?>