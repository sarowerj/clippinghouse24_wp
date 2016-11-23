<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-shadow-inside-top pi-section-grey">
    <div class="pi-section pi-section-md pi-titlebar pi-titlebar-breadcrumb-right pi-titlebar-small">
        <h1><?php the_title(); ?></h1>

        <div class="pi-breadcrumb">You are here:
            <ul>
                <li><a href="<?= esc_url(home_url('/')); ?>">Home</a></li>
                <li><?php the_title(); ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - -->