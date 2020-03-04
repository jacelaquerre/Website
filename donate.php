<?php
include ('top.php');
?>

<article id="content">
    <h2>Donate</h2>
    <p>These people need your help. Please consider donating to help supply them with clean food and water as well as basic living conditions. The Rohingyans are a people with no home and nothing left, and they need our help. Any amount can make a difference, and it feels good to give back to the world. Winter is here and now more than ever donations are needed. Things like blankets, warm clothes, and materials for housing are in high demand and low supply. More and more people are coming across the border every day, and it is becoming increasingly harder for rescue workers to keep up in their aid. Not only that, but donations to charity also come with a tax break for you, so this is a way to ensure your money goes towards something you truly care about. </p>
    
    <fieldset>
        <legend class="legend">Donate</legend>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">

    <input type="hidden" name="Helping Refugees"
        value="ajslocum@uvm.edu">

    <!-- Specify a Donate button. -->
    <input type="hidden" name="cmd" value="_donations">

    <!-- Specify details about the contribution -->
    <input type="hidden" name="item_name" value="Helping Refugees">
    <input type="hidden" name="item_number" value="Helping Refugees">
    <input type="hidden" name="currency_code" value="USD">

    <!-- Display the payment button. -->
    <input type="image" name="submit"
    src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_donate_92x26.png"
    alt="Donate">
    <img alt="" width="1" height="1"
    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
    </form>

    </fieldset>

    <figure class="fiftyPercent roundedCornersSmall news pictures donate">
    <img class="roundedCornersSmall" src="../images/happy.jpg" alt="Happy Child"/>
    <figcaption>Image taken from https://stevegumaer.com/tag/burmamyanmar/</figcaption>
    </figure>

</article>
<?php
include ('footer.php');
?>
</body>
</html>
