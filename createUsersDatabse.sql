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
    extensions varchar
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

CREATE TABLE notifications (
    user_from VARCHAR NOT NULL REFERENCES users(username),
    user_to VARCHAR NOT NULL REFERENCES users(username),
    notification_content TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);