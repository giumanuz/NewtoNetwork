CREATE TABLE users
(	first_name varchar NOT NULL,
	surname varchar,
 	email varchar NOT NULL UNIQUE,
  	passw varchar NOT NULL,
 	birthday varchar,
  	username varchar NOT NULL PRIMARY KEY,
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
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    PRIMARY KEY (user_id, friend_user_id)
);

CREATE TABLE friend_requests (
    sender VARCHAR NOT NULL REFERENCES users(username),
    receiver VARCHAR NOT NULL REFERENCES users(username),
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    PRIMARY KEY (sender, receiver)
);

CREATE TABLE posts (
    post_id SERIAL PRIMARY KEY,
    writer VARCHAR NOT NULL REFERENCES users(username),
    post_content TEXT NOT NULL,
    photo varchar,
    category varchar,
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE notifications (
    user_from VARCHAR NOT NULL REFERENCES users(username),
    user_to VARCHAR NOT NULL REFERENCES users(username),
    notification_content TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE likes (
    post_id INTEGER NOT NULL REFERENCES posts(post_id),
    user_id VARCHAR NOT NULL REFERENCES users(username),
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
	primary key (post_id, user_id)
);


CREATE TABLE comments (
    comment_id SERIAL PRIMARY KEY,
    post_id INTEGER NOT NULL REFERENCES posts(post_id),
    user_id VARCHAR NOT NULL REFERENCES users(username),
    comment_content TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE messages (
    message_id SERIAL PRIMARY KEY,
    sender VARCHAR NOT NULL REFERENCES users(username),
    receiver VARCHAR NOT NULL REFERENCES users(username),
    message_content TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE videos (
    url VARCHAR PRIMARY KEY,
    title VARCHAR NOT NULL,
);

INSERT INTO videos (url, title) VALUES 
('https://www.youtube.com/embed/HEfHFsfGXjs', 'The most unexpected answer to a counting puzzle'),
('https://www.youtube.com/embed/wTJI_WuZSwE', 'The impossible chessboard puzzle'),
('https://www.youtube.com/embed/aircAruvnKk', 'But what is a neural network? | Chapter 1, Deep learning'),
('https://www.youtube.com/embed/KuXjwB4LzSA', 'But what is a convolution?'),
('https://www.youtube.com/embed/cy8r7WSuT1I', 'Why π is in the normal distribution (beyond integral tricks)'),
('https://www.youtube.com/embed/EK32jo7i5LQ', 'Why do prime numbers make these spirals? | Dirichlet’s theorem, pi approximations, and more'),
('https://www.youtube.com/embed/zeJD6dqJ5lo', 'But what is the Central Limit Theorem?'),
('https://www.youtube.com/embed/bBC-nXj3Ng4', 'But how does bitcoin actually work?'),
('https://www.youtube.com/embed/bOXCLR3Wric', 'Olympiad level counting'),
('https://www.youtube.com/embed/84hEmGHw3J8', 'A Curious Pattern Indeed'),
('https://www.youtube.com/embed/ZA4JkHKZM50', 'Why “probability of 0” does not mean “impossible” | Probabilities of probabilities, part 2'),
('https://www.youtube.com/embed/fRed0Xmc2Wg', 'Oh, wait, actually the best Wordle opener is not “crane”…'),
('https://www.youtube.com/embed/WUvTyaaNkzM', 'The essence of calculus'),
('https://www.youtube.com/embed/r6sGWTCMz2k', 'But what is a Fourier series?  From heat flow to drawing with circles | DE4'),
('https://www.youtube.com/embed/Ilg3gGewQ5U', 'What is backpropagation really doing? | Chapter 3, Deep learning'),
('https://www.youtube.com/embed/MzRCDLre1b4', 'Some light quantum mechanics (with minutephysics)'),
('https://www.youtube.com/embed/b3NxrZOu_CE', 'Hamming codes part 2, the elegance of it all'),
('https://www.youtube.com/embed/HUavYvn8_Pw', 'Насколько безопасно 256-битное шифрование? [3Blue1Brown]'),
('https://www.youtube.com/embed/U4ogK0MIzqk', 'Coding Adventure: Chess'),
('https://www.youtube.com/embed/QDX-1M5Nj7s', 'MIT Introduction to Deep Learning | 6.S191'),
('https://www.youtube.com/embed/zFhYJRqz_xk', 'Your Body Killed Cancer 5 Minutes Ago'),
('https://www.youtube.com/embed/4u5I8GYB79Y', 'The Deadliest Virus on Earth'),
('https://www.youtube.com/embed/7OPg-ksxZ4Y', 'The Most Horrible Parasite: Brain Eating Amoeba'),
('https://www.youtube.com/embed/F1Hq8eVOMHs', 'Is Meat Really that Bad?'),
('https://www.youtube.com/embed/lXfEK8G8CUI', 'How The Immune System ACTUALLY Works – IMMUNE'),
('https://www.youtube.com/embed/eVjhOzY9KvY', 'NVIDIA Is Simulating 100,000 Hair Strands!'),
('https://www.youtube.com/embed/efw8xuex4uI', 'DeepMind’s AI Athletes Play In The Real World!'),
('https://www.youtube.com/embed/1KQc6zHOmtU', 'DeepMind’s AlphaFold AI: Doing Years Of Research In Minutes!'),
('https://www.youtube.com/embed/ZMQbHMgK2rw', 'The Fastest Maze-Solving Competition On Earth'),
('https://www.youtube.com/embed/pXoZQsZP2PY', 'How To Measure The Tiniest Forces In The Universe'),
('https://www.youtube.com/embed/nmgFG7PUHfo', 'The Remarkable Story Behind The Most Important Algorithm Of All Time'),
('https://www.youtube.com/embed/iSNsgj1OCLA', 'The Riddle That Seems Impossible Even If You Know The Answer'),
('https://www.youtube.com/embed/bHIhgxav9LY', 'The Big Misconception About Electricity'),
('https://www.youtube.com/embed/094y1Z2wpJg', 'The Simplest Math Problem No One Can Solve - Collatz Conjecture'),
('https://www.youtube.com/embed/WXuK6gekU1Y', 'AlphaGo - The Movie | Full award-winning documentary');