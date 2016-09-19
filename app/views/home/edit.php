
<form method="post" action="/public/home/update/<?=$param[0]['id']?>"> 
    <input type="text" name="name" value="<?=$param[0]['name']?>" /><br>
    <input type="email" name="email" value="<?=$param[0]['email']?>" /><br>
    <input type="submit"  value="add" /><br>
</form>