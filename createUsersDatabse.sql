CREATE TABLE users
(	first_name varchar NOT NULL,
	surname varchar,
 	email varchar NOT NULL UNIQUE,
  	passw varchar NOT NULL,
 	birthday varchar,
  	username varchar NOT NULL PRIMARY KEY,
	gender varchar,
    photo varchar, 
    extensionphoto varchar
);

CREATE TABLE quotes (
    phrase VARCHAR PRIMARY KEY,
    writer VARCHAR NOT NULL,
    photo varchar,
    extension varchar
);

CREATE TABLE friends (
    user_id VARCHAR NOT NULL REFERENCES users(username),
    friend_user_id VARCHAR NOT NULL REFERENCES users(username),
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE friend_requests (
    sender VARCHAR NOT NULL REFERENCES users(username),
    reciver VARCHAR NOT NULL REFERENCES users(username),
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE posts (
    post_id INTEGER PRIMARY KEY,
    writer VARCHAR NOT NULL REFERENCES users(username),
    post_content TEXT NOT NULL,
    photo varchar,
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE likes (
    like_id SERIAL PRIMARY KEY,
    post_id INTEGER NOT NULL REFERENCES posts(post_id),
    user_id INTEGER NOT NULL REFERENCES users(username),
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE comments (
    comment_id SERIAL PRIMARY KEY,
    post_id INTEGER NOT NULL REFERENCES posts(post_id),
    user_id INTEGER NOT NULL REFERENCES users(username),
    comment_content TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);