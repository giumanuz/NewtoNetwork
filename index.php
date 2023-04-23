<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>NewtoNetwork</title>
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
   <link rel="stylesheet" href="/css/index.css">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   

</head>

<body>
<body>
   <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="/index.php">NewtoNetwork</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

         <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
               <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
               </div>
            </li>
            <li class="nav-item">
               <a class="nav-link disabled" href="#">Disabled</a>
            </li>
         </ul>

         <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
         </form>

      </div>
   </nav> -->

   <!----------- MAIN ------------->
   <main>
      <div class="container">
         <!--======== LEFT ========-->
         <div class="left">
            <a class="profile">
               <div class="profile-photo">
                  <img src="/images/profile-1.jpg" alt="">
               </div>
               <div class="handle">
                  <h4>Matteo D'Agostino</h4>
                  <p class="text-muted">
                     @matteo_digos
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

<script src="/js/index.js"></script>
</html>