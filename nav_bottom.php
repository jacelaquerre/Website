<!-- ######################   Start of Nav   ############################### -->
<nav id="nav_bottom">
    <ul>
        <?php
        
        //Index ------------------------------------
        print '<li class="';
        if ($path_parts['filename'] == 'index') {
            print 'activePage';
        }
        print '">';
        print '<a href="index.php">Home</a>';
        print '</li>';

        //Form ------------------------------------
        print '<li class="';
        if ($path_parts['filename'] == 'form') {
            print 'activePage';
        }
        print '">';
        print '<a href="form.php">Volunteer</a>';
        print '</li>';
        
        //Gallery -------------------------------------
        print '<li class="';
        if ($path_parts['filename'] == 'gallery') {
            print 'activePage';
        }
        print '">';
        print '<a href="gallery.php">Gallery</a>';
        print '</li>';

        //Learn ------------------------------------
        print '<li class="';
        if ($path_parts['filename'] == 'learn') {
            print 'activePage';
        }
        print '">';
        print '<a href="learn.php">Learn More</a>';
        print '</li>';

        //News ----------------------------------
        print '<li class="';
        if ($path_parts['filename'] == 'news') {
            print 'activePage';
        }
        print '">';
        print '<a href="news.php">News</a>';
        print '</li>';

        //Donate ---------------------------------
        print '<li class="';
        if ($path_parts['filename'] == 'donate') {
            print 'activePage';
        }
        print '">';
        print '<a href="donate.php">Donate</a>';
        print '</li>';
        ?>
    </ul>
</nav>
<!-- ######################   End of Nav   ################################# -->
