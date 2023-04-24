<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>NewtoNetwork</title>
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
   <link rel="stylesheet" href="/css/index.css">
</head>

<body>

<?php
   include "pages/navigationBar.php";
   include 'connection.php';
   // do a query for the user
   session_start();
   $username = $_SESSION['username'];
   $query = "SELECT * FROM users WHERE username = $1";
   $result = pg_query_params($dbconnession, $query, array($username)) or die("Query failed: " . pg_last_error());
   $row = pg_fetch_array($result, null, PGSQL_ASSOC);
   $first_name = $row['first_name'];
   $surname = $row['surname'];
   $gender = $row['gender'];
   $birthday = $row['birthday'];
   $username = $row['username'];
   $user_email = $row['email'];
   // $user_bio = $row['bio'];
   // $user_image = $row['image'];  TODO: add image to database


?>

<!----------- MAIN ------------->
   <main>
      <div class="container">
         <!--======== LEFT ========-->
         <div class="left">
            <a class="profile">
               <div class="profile-photo">
                  <img src="/images/profile-1.jpg" alt="">  
                  <!-- TODO: add image database -->
               </div>
               <div class="handle">
                  <h4><?php echo $first_name . " " . $surname; ?></h4>
                  <p class="text-muted">
                     <?php echo "@" . $username; ?>
                  </p>
               </div>
            </a>

            <!----------SIDEBAR----------- -->
            <div class="sidebar">
               <a class="menu-item active">
                  <span> <i class="uil uil-home-alt"></i> </span>
                  <h3>Home </h3>
               </a>
               <!-- <a class="menu-item">
                  <span> <i class="uil uil-compass"></i> </span>
                  <h3>Explore </h3>
               </a> -->
               <a class="menu-item" id="notifications">
                  <span> <i class="uil uil-bell"><small class="notifications-count">9+</small></i> </span>
                  <h3>Notifications </h3>
                  <!----------NOTIFICATION POPUP ------------>
                  <div class="notifications-popup">
                     <div>
                        <div class="profile-photo">
                           <img src="/images/profile-2.jpg" alt="">
                        </div>
                        <div class="notification-body">
                           <b> Giulio Manuzzi</b> accepted your friend request
                           <small class="text-muted"> 2 days ago </small>
                        </div>
                     </div>
                     <div>
                        <div class="profile-photo">
                           <img src="/images/profile-3.jpg" alt="">
                        </div>
                        <div class="notification-body">
                           <b> Sof Lor</b> commented on your post
                           <small class="text-muted"> 1 hour ago </small>
                        </div>
                     </div>
                  </div>
               </a>
               <a class="menu-item" id="messages-notification">
                  <span> <i class="uil uil-envelope"><small class="notifications-count">6</small></i> </span>
                  <h3>Messages </h3>
               </a>
               <!-- <a class="menu-item">
                  <span> <i class="uil uil-bookmark"></i> </span>
                  <h3>Bookmarks </h3>
               </a>
               
               <a class="menu-item">
                  <span> <i class="uil uil-palette"></i> </span>
                  <h3>Theme </h3>
               </a>
               <a class="menu-item">
                  <span> <i class="uil uil-setting"></i> </span>
                  <h3>Settings </h3>
               </a> -->
               <a class="menu-item">
                  <span> <i class="uil uil-chart-line"></i> </span>
                  <h3>Analytics </h3>
               </a>
            </div>
            <!---------END OF SIDEBAR--------->
            <label for="create-post" class="btn btn-primary">Create Post</label>
         </div>

         <!-- -------------------- END OF LEFT ---------------- -->

         <!--======== MIDDLE ========-->

         <div class="middle">
            <!-- ----------------- QUOTE OF THE DAY --------------- -->
            <div class="quote-square"> 
               <div class="card mb-3" style="max-width: 540px;">
                  <div class="row g-0">
                     <div class="col-md-4">
                        <img src="/scientist-images/Newton.png" style="margin-top:1rem;border-radius:50%;object-fit: cover;width: 150px;height: 150px;" class="img-fluid rounded-start" alt="...">
                     </div>
                     <div class="col-md-8">
                        <div class="card-body">
                           <h5 class="card-title" style="font-size:larger;margin-top:1rem">QUOTE OF THE DAY</h5>
                           <p class="card-text" style="margin-top: 2rem;"  >“La verità si ritrova sempre nella semplicità mai nella confusione.”</p>
                           <p class="card-text" style="margin-top: 1rem"><small class="text-body-secondary"><i>Sir Isaac Newton</i></small></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- ----------------- END OF QUOTE OF THE DAY --------------- -->
            <form class="create-post" action="">
               <div class="profile-photo">
                  <img src="/images/profile-1.jpg" alt="">
               </div>
               <input type="text" placeholder="What's on your mind, Diana?" id="create-post">
               <input type="submit" value="Post" class="btn btn-primary">

            </form>

            <!-- ------------------ FEEDS -------------------- -->
            <div class="feeds">
               <!-- ---------------- FEED 1 ----------------- -->
               <div class="feed">
                  <div class="head">
                     <div class="user">
                        <div class="profile-photo">
                           <img src="/images/profile-13.jpg">
                        </div>
                        <div class="ingo">
                           <h3>Alessandra</h3>
                           <small>Terni, 15 MINUTES AGO</small>
                        </div>
                     </div>
                     <span class="edit">
                        <i class="uil uil-ellipsis-h"></i>
                     </span>
                  </div>

                  <div class="photo">
                     <img src="/images/feed-1.jpg">
                  </div>

                  <div class="action-buttons">
                     <div class="interaction-buttons">
                        <span><i class="uil uil-heart"></i></span>
                        <span><i class="uil uil-comment"></i></span>
                        <span><i class="uil uil-share-alt"></i></span>

                     </div>

                     <div class="bookmark">
                        <span><i class="uil uil-bookmark"></i></span>
                     </div>
                  </div>
                  <div class="liked-by">
                     <span> <img src="/images/profile-10.jpg"></span>
                     <span> <img src="/images/profile-4.jpg"></span>
                     <span> <img src="/images/profile-15.jpg"></span>
                     <p> Liked by <b>Stocazzo</b> and <b>123 others</b></p>
                  </div>

                  <div class="caption">
                     <p> <b>Alessandra</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                     <span class="harsh-tag">#lifestyle</span>
                  </div>

                  <div class="comments text-muted">View all 277 comments</div>
               </div>
               <!-- ---------------- FEED 2 ----------------- -->
               <div class="feed">
                  <div class="head">
                     <div class="user">
                        <div class="profile-photo">
                           <img src="/images/profile-13.jpg">
                        </div>
                        <div class="ingo">
                           <h3>Alessandra</h3>
                           <small>Terni, 15 MINUTES AGO</small>
                        </div>
                     </div>
                     <span class="edit">
                        <i class="uil uil-ellipsis-h"></i>
                     </span>
                  </div>

                  <div class="photo">
                     <img src="/images/feed-2.jpg">
                  </div>

                  <div class="action-buttons">
                     <div class="interaction-buttons">
                        <span><i class="uil uil-heart"></i></span>
                        <span><i class="uil uil-comment"></i></span>
                        <span><i class="uil uil-share-alt"></i></span>

                     </div>

                     <div class="bookmark">
                        <span><i class="uil uil-bookmark"></i></span>
                     </div>
                  </div>
                  <div class="liked-by">
                     <span> <img src="/images/profile-10.jpg"></span>
                     <span> <img src="/images/profile-4.jpg"></span>
                     <span> <img src="/images/profile-15.jpg"></span>
                     <p> Liked by <b>Stocazzo</b> and <b>123 others</b></p>
                  </div>

                  <div class="caption">
                     <p> <b>Alessandra</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                     <span class="harsh-tag">#lifestyle</span>
                  </div>

                  <div class="comments text-muted">View all 277 comments</div>
               </div>
               <!-- ---------------- FEED 3 ----------------- -->
               <div class="feed">
                  <div class="head">
                     <div class="user">
                        <div class="profile-photo">
                           <img src="/images/profile-13.jpg">
                        </div>
                        <div class="ingo">
                           <h3>Alessandra</h3>
                           <small>Terni, 15 MINUTES AGO</small>
                        </div>
                     </div>
                     <span class="edit">
                        <i class="uil uil-ellipsis-h"></i>
                     </span>
                  </div>

                  <div class="photo">
                     <img src="/images/feed-3.jpg">
                  </div>

                  <div class="action-buttons">
                     <div class="interaction-buttons">
                        <span><i class="uil uil-heart"></i></span>
                        <span><i class="uil uil-comment"></i></span>
                        <span><i class="uil uil-share-alt"></i></span>

                     </div>

                     <div class="bookmark">
                        <span><i class="uil uil-bookmark"></i></span>
                     </div>
                  </div>
                  <div class="liked-by">
                     <span> <img src="/images/profile-10.jpg"></span>
                     <span> <img src="/images/profile-4.jpg"></span>
                     <span> <img src="/images/profile-15.jpg"></span>
                     <p> Liked by <b>Stocazzo</b> and <b>123 others</b></p>
                  </div>

                  <div class="caption">
                     <p> <b>Alessandra</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                     <span class="harsh-tag">#lifestyle</span>
                  </div>

                  <div class="comments text-muted">View all 277 comments</div>
               </div>
               <!-- ---------------- FEED 4 ----------------- -->
               <div class="feed">
                  <div class="head">
                     <div class="user">
                        <div class="profile-photo">
                           <img src="/images/profile-13.jpg">
                        </div>
                        <div class="ingo">
                           <h3>Alessandra</h3>
                           <small>Terni, 15 MINUTES AGO</small>
                        </div>
                     </div>
                     <span class="edit">
                        <i class="uil uil-ellipsis-h"></i>
                     </span>
                  </div>

                  <div class="photo">
                     <img src="/images/feed-4.jpg">
                  </div>

                  <div class="action-buttons">
                     <div class="interaction-buttons">
                        <span><i class="uil uil-heart"></i></span>
                        <span><i class="uil uil-comment"></i></span>
                        <span><i class="uil uil-share-alt"></i></span>

                     </div>

                     <div class="bookmark">
                        <span><i class="uil uil-bookmark"></i></span>
                     </div>
                  </div>
                  <div class="liked-by">
                     <span> <img src="/images/profile-10.jpg"></span>
                     <span> <img src="/images/profile-4.jpg"></span>
                     <span> <img src="/images/profile-15.jpg"></span>
                     <p> Liked by <b>Stocazzo</b> and <b>123 others</b></p>
                  </div>

                  <div class="caption">
                     <p> <b>Alessandra</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                     <span class="harsh-tag">#lifestyle</span>
                  </div>

                  <div class="comments text-muted">View all 277 comments</div>
               </div>
               <!-- ---------------- FEED 5 ----------------- -->
               <div class="feed">
                  <div class="head">
                     <div class="user">
                        <div class="profile-photo">
                           <img src="/images/profile-13.jpg">
                        </div>
                        <div class="ingo">
                           <h3>Alessandra</h3>
                           <small>Terni, 15 MINUTES AGO</small>
                        </div>
                     </div>
                     <span class="edit">
                        <i class="uil uil-ellipsis-h"></i>
                     </span>
                  </div>

                  <div class="photo">
                     <img src="/images/feed-5.jpg">
                  </div>

                  <div class="action-buttons">
                     <div class="interaction-buttons">
                        <span><i class="uil uil-heart"></i></span>
                        <span><i class="uil uil-comment"></i></span>
                        <span><i class="uil uil-share-alt"></i></span>

                     </div>

                     <div class="bookmark">
                        <span><i class="uil uil-bookmark"></i></span>
                     </div>
                  </div>
                  <div class="liked-by">
                     <span> <img src="/images/profile-10.jpg"></span>
                     <span> <img src="/images/profile-4.jpg"></span>
                     <span> <img src="/images/profile-15.jpg"></span>
                     <p> Liked by <b>Stocazzo</b> and <b>123 others</b></p>
                  </div>

                  <div class="caption">
                     <p> <b>Alessandra</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                     <span class="harsh-tag">#lifestyle</span>
                  </div>

                  <div class="comments text-muted">View all 277 comments</div>
               </div>
               <!-- ---------------- FEED 6 ----------------- -->
               <div class="feed">
                  <div class="head">
                     <div class="user">
                        <div class="profile-photo">
                           <img src="/images/profile-13.jpg">
                        </div>
                        <div class="ingo">
                           <h3>Alessandra</h3>
                           <small>Terni, 15 MINUTES AGO</small>
                        </div>
                     </div>
                     <span class="edit">
                        <i class="uil uil-ellipsis-h"></i>
                     </span>
                  </div>

                  <div class="photo">
                     <img src="/images/feed-6.jpg">
                  </div>

                  <div class="action-buttons">
                     <div class="interaction-buttons">
                        <span><i class="uil uil-heart"></i></span>
                        <span><i class="uil uil-comment"></i></span>
                        <span><i class="uil uil-share-alt"></i></span>

                     </div>

                     <div class="bookmark">
                        <span><i class="uil uil-bookmark"></i></span>
                     </div>
                  </div>
                  <div class="liked-by">
                     <span> <img src="/images/profile-10.jpg"></span>
                     <span> <img src="/images/profile-4.jpg"></span>
                     <span> <img src="/images/profile-15.jpg"></span>
                     <p> Liked by <b>Stocazzo</b> and <b>123 others</b></p>
                  </div>

                  <div class="caption">
                     <p> <b>Alessandra</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                     <span class="harsh-tag">#lifestyle</span>
                  </div>

                  <div class="comments text-muted">View all 277 comments</div>
               </div>
               <!-- ---------------- FEED 7 ----------------- -->
               <div class="feed">
                  <div class="head">
                     <div class="user">
                        <div class="profile-photo">
                           <img src="/images/profile-13.jpg">
                        </div>
                        <div class="ingo">
                           <h3>Alessandra</h3>
                           <small>Terni, 15 MINUTES AGO</small>
                        </div>
                     </div>
                     <span class="edit">
                        <i class="uil uil-ellipsis-h"></i>
                     </span>
                  </div>

                  <div class="photo">
                     <img src="/images/feed-7.jpg">
                  </div>

                  <div class="action-buttons">
                     <div class="interaction-buttons">
                        <span><i class="uil uil-heart"></i></span>
                        <span><i class="uil uil-comment"></i></span>
                        <span><i class="uil uil-share-alt"></i></span>

                     </div>

                     <div class="bookmark">
                        <span><i class="uil uil-bookmark"></i></span>
                     </div>
                  </div>
                  <div class="liked-by">
                     <span> <img src="/images/profile-10.jpg"></span>
                     <span> <img src="/images/profile-4.jpg"></span>
                     <span> <img src="/images/profile-15.jpg"></span>
                     <p> Liked by <b>Stocazzo</b> and <b>123 others</b></p>
                  </div>

                  <div class="caption">
                     <p> <b>Alessandra</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                     <span class="harsh-tag">#lifestyle</span>
                  </div>

                  <div class="comments text-muted">View all 277 comments</div>
               </div>
            </div>
         </div>

         <!--======== RIGHT ========-->
         <div class="right">
            <div class="messages">
               <div class="heading">
                  <h4>Messages</h4><i class="uil uil-edit"></i>
               </div>
               <!-- -------------SEARCH BAR ----------------->
               <div class="search-bar">
                  <i class="uil uil-search"></i>
                  <input type="search" placeholder="Search messages" id="message-search">
               </div>
               <!------------MESSAGE CATEGORY--------------->
               <div class="category">
                  <h6 class="active">Primary</h6>
                  <h6>General</h6>
                  <h6 class="message-requests">Requests (7)</h6>
               </div>
               <!-- MESSAGE -->
               <div class="message">
                  <div class="profile-photo">
                     <img src="/images/profile-7.jpg">
                     <div class="active"></div>
                  </div>
                  <div class="message-body">
                     <h5>Edem Quist</h5>
                     <p class="text-muted">Just woke up bruh</p>
                  </div>
               </div>

               <!-- MESSAGE -->
               <div class="message">
                  <div class="profile-photo">
                     <img src="/images/profile-14.jpg">
                  </div>
                  <div class="message-body">
                     <h5>Ceccum</h5>
                     <p class="text-muted">Sai...</p>
                  </div>
               </div>
            </div>
            <!-- ----------- FRIEND REQUESTS --------------- -->
            <div class="friend-requests">
               <h4>Requests</h4>
               <div class="request">
                  <div class="info">
                     <div class="profile-photo">
                        <img src="/images/profile-13.jpg" alt="">
                     </div>
                     <div>
                        <h5>Haija Bintu</h5>
                        <p class="text-muted">
                           8 mutual friends
                        </p>
                     </div>
                  </div>
                  <div class="action">
                     <button class="btn btn-primary">Accept</button>
                     <button class="btn">Decline</button>
                  </div>
               </div>
               <div class="request">
                  <div class="info">
                     <div class="profile-photo">
                        <img src="/images/profile-13.jpg" alt="">
                     </div>
                     <div>
                        <h5>Haija Bintu</h5>
                        <p class="text-muted">
                           8 mutual friends
                        </p>
                     </div>
                  </div>
                  <div class="action">
                     <button class="btn btn-primary">Accept</button>
                     <button class="btn">Decline</button>
                  </div>
               </div>

            </div>
         </div>
      </div>
      </div>
   </main>

</body>

<script src="/js/index.js"></script>e

</html>