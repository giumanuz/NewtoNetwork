<?php
$query = "SELECT * FROM quotes ORDER BY RANDOM() LIMIT 1";
$result = pg_query($dbconnession, $query) or die("Query failed: " . pg_last_error());
$row = pg_fetch_array($result, null, PGSQL_ASSOC);
$phrase = $row['phrase'];
$writer = $row['writer'];
$photo = $row['photo'];
$extension = $row['extensions'];
echo "
                    
                    <div class='quote-square' style='z-index:-1;'> 
                    <div class='card mb-3 d-flex flex-sm-row text-center justify-content-center' style='max-width: 100%;border:none;z-index:0;'>
                       
                          <div class='px-auto d-flex text-center justify-content-center' style='justify-self:center;'>
                             <img class=\"profile-photo my-auto \" src='data:image/" . $extension . ";base64," . $photo . "' alt='Binary Image' style='text-align:center;margin-top:1rem;border-radius:50%;object-fit: cover;width: 150px;height: 150px;' class='img-fluid rounded-start' alt='...'>
                          </div>
                          
                         
                             <div class='card-body mx-auto '>
                                <h5 class='card-title ' style='font-size:larger;margin-top:1rem'>QUOTE OF THE MOMENT</h5>
                                <p class='card-text' style='margin-top: 2rem;'  >“" . $phrase . "”</p>
                                <p class='card-text' style='margin-top: 1rem'><small class='text-body-secondary'><i> " . $writer . "</i></small></p>
                             </div>
                          
                       
                    </div>
                    </div>
                    ";
