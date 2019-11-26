# AgVoy - Bastien PORTE & Ahmed TSOROEV

CSC4101

Les différentes routes et accès:

| NAME | PATH | ACCESS |
| --- | --- | --- |
`home` | / | Anyone                                 
`region_index` | /region/ | Anyone                           
`region_new` | /region/new | **Admin**                       
`region_show` | /region/{id} | Anyone                      
`region_show_list` | /region/{id}/roomslist | Anyone            
`region_edit` | /region/{id}/edit | **Admin**
`region_delete` | /region{id}/ | **Admin**            
`app_register` | /register | Anyone             
`room_index` | /room/ | Anyone               
`room_new` | /room/new | **Admin**                  
`room_show` | /room/{id} | Anyone                   
`room_edit` | /room/{id}/edit | **Admin**                
`room_delete` | /room/{id}/delete | **Admin**              
`app_login` | /login | Anyone                
`app_logout` | /logout | Anyone
