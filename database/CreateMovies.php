<?php
include('conn.php');

$sql = "

INSERT INTO movies
VALUES ('tt1375666', 'Inception', 2010, '2010-07-29', 'Christopher Nolan', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Elliot Page','
https://imdb-api.com/images/original/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_Ratio0.6762_AL_.jpg', 'Dom Cobb is a skilled thief, the absolute best in the dangerous art of extraction, stealing valuable secrets from deep within the subconscious during the dream state, when the mind is at its most vulnerable. Cobb&#39;s rare ability has made him a coveted player in this treacherous new world of corporate espionage, but it has also made him an international fugitive and cost him everything he has ever loved. Now Cobb is being offered a chance at redemption. One last job could give him his life back but only if he can accomplish the impossible, inception. Instead of the perfect heist, Cobb and his team of specialists have to pull off the reverse: their task is not to steal an idea, but to plant one. If they succeed, it could be the perfect crime. But no amount of careful planning or expertise can prepare the team for the dangerous enemy that seems to predict their every move. An enemy that only Cobb could have seen coming.'),
 ('tt0120338', 'Titanic', 1997, '1997-07-29', 'James Cameron', 'Leonardo DiCaprio, Kate Winslet','
https://m.media-amazon.com/images/M/MV5BMDdmZGU3NDQtY2E5My00ZTliLWIzOTUtMTY4ZGI1YjdiNjk3XkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_.jpg', '84 years later, a 100 year-old woman named Rose DeWitt Bukater tells the story to her granddaughter Lizzy Calvert, Brock Lovett, Lewis Bodine, Bobby Buell and Anatoly Mikailavich on the Keldysh about her life set in April 10th 1912, on a ship called Titanic when young Rose boards the departing ship with the upper-class passengers and her mother, Ruth DeWitt Bukater, and her fiancé, Caledon Hockley. Meanwhile, a drifter and artist named Jack Dawson and his best friend Fabrizio De Rossi win third-class tickets to the ship in a game. And she explains the whole story from departure until the death of Titanic on its first and last voyage April 15th, 1912 at 2:20 in the morning.'),
 ('tt0418279', 'Transformers', 2007, '2007-03-05', 'Michael Bay ', 'Shia LaBeouf, Megan Fox','
https://m.media-amazon.com/images/M/MV5BNDg1NTU2OWEtM2UzYi00ZWRmLWEwMTktZWNjYWQ1NWM1OThjXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_.jpg', 'High-school student Sam Witwicky buys his first car, who is actually the Autobot Bumblebee. Bumblebee defends Sam and his girlfriend Mikaela Banes from the Decepticon Barricade, before the other Autobots arrive on Earth. They are searching for the Allspark, and the war on Earth heats up as the Decepticons attack a United States military base in Qatar. Sam and Mikaela are taken by the top-secret agency Sector 7 to help stop the Decepticons, but when they learn the agency also intends to destroy the Autobots, they formulate their own plan to save the world.'),
 ('tt0096657', 'Mr. Bean', 1990, '1990-12-05', 'Rowan Atkinson ', 'Rowan Atkinson, Robin Driscoll','
https://m.media-amazon.com/images/M/MV5BOGNjZTRlNDctNGI0Yi00YmFkLTljMmQtMjQ1ZjdiNmU5YTc0XkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_.jpg', 'Mr Bean (portrayed by Sir Rowan Sebastian Atkinson) is a lazy, crazy, clumsy, mischievous and destructive lunatic alien man from outer space who has fallen to earth out of his UFO. join him on his adventures of solving problems and creating worse disasters in this hilarious slapstick science fiction comedy Television sitcom series for the entire family.')
;

";

if ($conn->query($sql) === TRUE) {
    echo "movie created successfully" . "<br>";
} else {
    echo "Error creating movie: " . $conn->error;
}
?>
