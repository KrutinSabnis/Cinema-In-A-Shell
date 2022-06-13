<?php
include('conn.php');

$sql = "

INSERT INTO comment (Text, CommentDate, Username, MovieId)
VALUES ('Very good movie. Fun to watch.', '2021-11-25', 'Poonam', 'tt1375666'),
 ('A sad story of a tragedy of two people within the tragedy of the unsinkable ship. The basic plot involves a poor guy and some woman with very little freedom and their interactions.  It was not very interesting, but the set and the acting was good.', '2021-11-22', 'Huzaifa', 'tt0120338'),
 ('Must watch. The idea of ‘Inception’ is to be a story crafted in the architecture of the mind – Cobb’s mind. What people perceive to be real isn’t necessarily so, because the mind can make things appear to be as real as ever. ', '2021-11-23', 'Huzaifa', 'tt1375666'),
 ('We all know Mr Bean and how he makes us laugh at the cost of endangering the lives of those around him. Here he goes around living his daily life, masquerading as a world famous artist, making his own lunch while sitting in a park, shopping, dining and other regular and irregular activities. Must watch!', '2021-11-24', 'Krutin', 'tt0096657'),
 ('I did not like this movie. The guy is dumb and he does very basic slapstick comedy. This wouldnt be famous if this show was aired today.', '2021-12-02', 'Huzaifa', 'tt0096657'),
 ('Amazing movie. In it his daily life is shown, which is so similar but also so different from our own. From when he wakes up in the morning and shaves hilariously, to when he goes to bed and uses a gun to shoot the bulb instead of switching off the lights, it is always engaging and funny to everyone!.', '2021-11-30', 'Poonam', 'tt0096657')
;

";

if ($conn->query($sql) === TRUE) {
    echo "comment added successfully" . "<br>";
} else {
    echo "Error adding comment: " . $conn->error;
}
?>
