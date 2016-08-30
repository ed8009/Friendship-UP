<?php
echo '<h1><center>Api Server: travel-app.ru/api</center></h1><br>';
echo '<p>1. http://travel-app.ru/api/?api.getUsers={} - Получить список пользователей</p>';
echo '<p>2. http://travel-app.ru/api/?api.printTestMessage={} - test</p>';
echo '<p>3. http://travel-app.ru/api/?api.getLikeUserWithID={"userID":"user_id_vk"} - получить список пользователей, которых лайкнул нужный юзер</p>';
echo '<p>4. http://travel-app.ru/api/?api.getUserVkById={"userVK":"user_id_vk"} - получить id vk по id пользоватля</p>';
echo '<p>5. http://travel-app.ru/api/?api.getUserIDByVKId={"userVK":"user_id_vk"} - </p>';
echo '<p>6. http://travel-app.ru/api/?api.saveUserTokenById={"idVK":"user_id_vk","token":"token_value"} - Сохранение/обновление токена</p>';
echo '<p>7. http://travel-app.ru/api/?api.getTokenByUserIdVK={"idVK":"user_id_vk"} - получить токен по id vk</p>';

?>