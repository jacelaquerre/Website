<?php
include ('top.php');
?>

<article id="home">
<h1>Home</h1>


<div class="slideshow-container">
  <div class="mySlides fade">
    <div class="numbertext">Photo by: National Public Radio</div>
    <img src="../images/slider1.jpg" alt="" style="width:50%"/>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">Photo by: Aljazeera</div>
    <img src="../images/slider2.jpg" alt="" style="width:50%"/>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">Photo by: The New Indian Express</div>
    
    <img src="../images/slider3.jpg" alt="" style="width:50%"/>
    
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<!-- JavaScript -->
<script src="javascript/jquery.js" type="text/javascript"></script>    



<aside id="other">
    <h2>About</h2>
    <p>The world's most persecuted minority needs help, and they need it soon. The Rohingya, a muslim ethnic minority living in Myanmar, are being attacked and displaced from their country. Since last summer, upwards of 500,000 refugees have been forced to flee into neighboring countries, mainly Bangladesh.</p>
    
    <p>There have been widespread attacks around the country by police and military targeting the Rohingyans. This has lead to the UN High Commissioner For Human Rights declaring this a "textbook ethnic cleansing". Most information about this crisis is coming from first hand reports of refugees who made it across the border, as Myanmar is not allowing outside countries or the UN to conduct their own investigation. The UN High Commissioner For Human Rights published a paper from accounts of refugees that reported widespread accounts of beatings, killings and sexual assault. Over 50% of women reported being a victim of sexual assault.</p>
    
    <p>The UN has described this as "the world's fastest growing refugee crisis". The Myanmar government has reported killing over 500 Muslim Rohingyans, describing them as "terrorists". The Myanmar government is not allowing any outside journalists entry to the country to report on this crisis, which raises suspicion even further about their self-reported numbers. It is theorized by the UN that the actual death count caused by the Myanmar police and military is in the 1000's. The death toll from starvation, disease, and exposure during the mass migration out of Myanmar is still unknown at this point. Over 1.1 million Rohingyans are still living in apartheid-like conditions in Myanmar. They are denied citizenship by Myanmar despite most of them being born there and are considered illegal immigrants from Bangladesh by the Buddhist majority of Myanmar. The government, led by Aung San Suu Kyi, said it would investigate the allegations of murder, torture and rape by the UN. Aung San Suu Kyi, despite being a previous Nobel Peace Prize winner, has done little to nothing to help ease the suffering of the Rohingyans. She is however in a difficult position due to how the Myanmar government is run. Despite being the head of state, she has no power over the armed forces which has been a primary cause of this conflict. </p>
    
    <p>Young, typically fighting age men have been the primary targets for the military and police. There have been reports that they are being targeted as they are seen as more of a threat by the Myanmar military. A UN official was quoted saying “If you look at the new arrivals – the majority are women – so many of them talk about a killed husband, a slaughtered uncle or a missing brother. Where are all the men?”. Many who made it across the border reported describing men taken away by military with their hands tied behind their heads or backs. A spokesman for the Myanmar police told the UN they were just doing their jobs by making these arrests. Whether or not these allegations are true and what the actual causes are for this crisis, the point remains the same that these people need our help. </p>
</aside>

<iframe width="560" height="315" src="https://www.youtube.com/embed/yRnWtbZv83w" allowfullscreen>
</iframe>

</article>
<?php
include('footer.php');
?>
</body>
</html>
