<?php
include ('top.php');
//Array with data
$images = array(
    array(1, "../images/ANADOLU_AGENCY.jpg", "Picture By: Anadolu Agencgy"),
    array(2, "../images/BBC.jpg", "Picture By: BBC"),
    array(3, "../images/BDNEWS.jpg", "Photo By: BD NEws"),
    array(4, "../images/CNN.jpg", "Photo By: CNN"),
    array(5, "../images/CNN2.jpg", "Photo By: CNN"),
    array(6, "../images/VOA_NEWS.jpg", "Photo By: VOA News")
);
?>
        <article id="pictures">
            <h1>Gallery</h1>
            <p>The Crisis In Pictures</p>
            <?php
            foreach ($images as $image) {
                print '<figure class="roundedCornersSmall fiftyPercent pictures">';
                print '<img alt="" class="roundedCornersSmall" src="../images/' . $image[1] . '">';
                print '<figcaption>';
                print $image[2];
                print '</figcaption>';
                print '</figure>' . PHP_EOL;
            }
            ?>
        
   
        </article>
<?php
include ('footer.php');
?>
</body>
</html>