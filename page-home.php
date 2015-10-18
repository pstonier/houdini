<?php
/*
Template Name: home
*/

get_header(); ?>
	<section id="hero" style="background-image:url('<?php the_field("hero_image"); ?>');"><?php the_field("hero_text"); ?></section>
	<section id="intro">
			<div class="intro-text"><?php the_field("intro_text"); ?></div>
			<div class="video"><a href="<?php the_field("intro_video_link"); ?>"><img src="<?php the_field("intro_video_thumbnail"); ?>" alt="Live Well Upstate Video" /></a></div>
	</section>
	<section id="section-a"><?php the_field("section_a"); ?></section>
	<section id="section-b"><?php the_field("section_b"); ?></section>
	<section id="section-c"><?php the_field("section_c"); ?></section>
	<section id="section-d"><?php the_field("section_d"); ?></section>

<?php get_footer(); ?>
