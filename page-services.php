<?php
get_header();
?>

    <div class="wrapper page-header">
        <?php get_template_part('template-parts/process-services-form'); ?>
    </div>
</header>
<main>
    <div class="wrapper wrapper-narrow center">
        <h1>Website Services</h1>
        <p>
            Do you need a website for yourself or your business? Do you need a developer to update your existing website? Are you looking to hire a web developer to manage your current website? You’re in luck! Check out the following services I offer and contact me&mdash;I’d love to work with you!
        </p>
        <div class="buttons">
            <a href="/contact" class="button">Contact me</a>
            <a href="#services-form" class="button button-secondary">Get a quote</a>
        </div>
    </div>
    <section class="wrapper">
        <div class="grid grid-3 grid-sm">
            <article class="flex flex-services" id="full-website">
                <div class="services-icon">
                    <i class="bi bi-wordpress"></i>
                </div>
                <h3>Full Website</h3>
                <p>
                    Starting from scratch or fully overhauling your current website? I’ll meet with you to discuss your business needs and do market research to determine the design and functionality you’ll need for your site. Once we’ve determined a design, I’ll develop a custom WordPress template for your site that looks good and functions well on every device. I’ll make sure the site follows best accessibility and SEO standards.
                </p>
                <a class="button" href="#services-form" onclick="getQuote('both')">Get a full website quote</a>
            </article>
            <article class="flex flex-services" id="web-design">
                <div class="services-icon">
                    <i class="bi bi-circle-square"></i>
                </div>
                <h3>Web Design</h3>
                <p>
                    I’ll work with you to create a website design for each of the pages you’ll need for your website. You’ll play an active role in choosing the design and can easily let me know what you like and don’t like. You can send these files to your developer for them to create your website.
                </p>
                <p>
                    *This does not include a working website&mdash;only static files for you to send to your developer.
                </p>
                <a class="button" href="#services-form" onclick="getQuote('design')">Get a web design quote</a>
            </article>
            <article class="flex flex-services" id="web-development">
                <div class="services-icon">
                    <i class="bi bi-code-slash"></i>
                </div>
                <h3>Web Development</h3>
                <p>
                    Do you already have website design files? I’ll create a custom HTML or WordPress website based on that design that looks good and functions well on every device. We will meet to discuss any extra functionality you need: including social media integration, blog, and other custom functions. I’ll make sure the site follows best accessibility and SEO standards.
                </p>
                <a class="button" href="#services-form" onclick="getQuote('development')">Get a web development quote</a>
            </article>
        </div>
    </section>

    <form action="" method="post" class="services-form" id="services-form">
        <section class="border-top grid grid-3 wrapper">
            <div class="span-2">
                <h2>Ready to get started?</h2>
                <p>Answer a couple of questions and get a quote in real time. Not sure what you need? Schedule a free consultation by <a href="/contact">contacting me.</a></p>

                <!-- Service Inputs -->
                <h3 class="flex flex-sm">
                    Which service do you need?
                    <a class="icon-only" href="#full-website">
                        <i class="bi bi-question-circle"></i>
                    </a>
                </h3>

                <div class="flex flex-sm flex-wrap">
                    <label for="service_both">
                        <input required type="radio" id="service_both" name="service" data-price="500" value="design and development">
                        <p><i class="bi bi-wordpress"></i>Full Website</p>
                        <span>STARTING AT $500</span>
                    </label>

                    <label for="service_design">
                        <input required type="radio" id="service_design" name="service" data-price="200" value="design only">
                        <p><i class="bi bi-circle-square"></i>Web Design Only</p>
                        <span>STARTING AT $200</span>
                    </label>

                    <label for="service_development">
                        <input required type="radio" id="service_development" name="service" data-price="400" value="development only">
                        <p><i class="bi bi-code-slash"></i>Web Development Only</p>
                        <span>STARTING AT $400</span>
                    </label>
                </div>

                <!-- Pages Inputs -->
                <h3 class="flex flex-sm">
                    How many pages do you need?
                    <button type="button" class="icon-only" onclick="showModal('pages_dialog')">
                        <i class="bi bi-question-circle"></i>
                    </button>
                </h3>

                <div class="flex flex-sm flex-wrap">
                    <label for="pages_single">
                        <input required type="radio" id="pages_single" name="pages" data-pages="single" value="single page">
                        <p>1 page</p>
                        <span>STARTING AT $<span id="starting_single">200</span></span>
                    </label>

                    <label for="pages_multi">
                        <input required type="radio" id="pages_multi" name="pages" data-pages="multi" value="2-4 pages">
                        <p>2-4 pages</p>
                        <span>STARTING AT $<span id="starting_multi">300</span></span>
                    </label>

                    <label for="pages_custom">
                        <input required type="radio" id="pages_custom" name="pages" data-pages="custom" value="custom pages">
                        <p>5+ pages</p>
                        <span>STARTING AT $<span id="starting_custom">400</span></span>
                    </label>

                    <label for="custom_pages">
                        <input type="number" id="custom_pages" name="custom_pages" min="5" disabled placeholder=" ">
                        <p class="fancy-placeholder">Number of pages</p>
                    </label>
                </div>

                <!-- Features Inputs -->

                <h3 class="flex flex-sm">
                    Do you need any additional features?
                    <button type="button" class="icon-only" onclick="showModal('features_dialog')">
                        <i class="bi bi-question-circle"></i>
                    </button>
                </h3>

                <div class="flex flex-sm flex-wrap">
                    <label for="features_blog">
                        <input type="checkbox" id="features_blog" name="features[]" data-price="200" value="blog" data-features="[5]">
                        <p>
                            <i class="bi bi-chat-square-text"></i>
                            Blog
                        </p>
                        <span>$200</span>
                    </label>

                    <label for="features_hosting">
                        <input type="checkbox" id="features_hosting" name="features[]" data-price="0" value="hosting" data-features="[6]">
                        <p><i class="bi bi-hdd-network"></i>Hosting</p>
                        <span>$50/mo</span>
                    </label>

                    <label for="features_mailing_list">
                        <input type="checkbox" id="features_mailing_list" name="features[]" data-price="100" value="mailing list" data-features="[7]">
                        <p><i class="bi bi-envelope-check"></i>Mailing List Integration</p>
                        <span>$100</span>
                    </label>

                    <label for="features_contact_form">
                        <input type="checkbox" id="features_contact_form" name="features[]" data-price="0" value="contact form" data-features="[3]">
                        <p><i class="bi bi-person-lines-fill"></i></i>Contact Form</p>
                        <span>$0</span>
                    </label>

                    <label for="features_custom">
                        <input type="checkbox" id="features_custom" name="features[]" data-price="0" value="custom features" data-features="[]">
                        <p><i class="bi bi-pencil"></i>Custom Features</p>
                        <span>$50/hr of work</span>
                    </label>

                    <label for="custom_features">
                        <input type="text" id="custom_features" name="custom_features" placeholder=" " disabled>
                        <p class="fancy-placeholder">Explain custom features</p>
                    </label>
                </div>

                <h3>Contact Information</h3>

                <div class="flex flex-sm flex-column">
                    <div class="grid grid-2">
                        <label for="user_name">
                            <input required type="text" id="user_name" name="user_name" placeholder=" ">
                            <p class="fancy-placeholder">Name</p>
                        </label>

                        <label for="email">
                            <input required type="email" id="email" name="email" placeholder=" ">
                            <p class="fancy-placeholder">Email</p>
                        </label>
                    </div>

                    <label class="form-full-width">
                        <textarea name="message" id="message" cols="30" rows="10" placeholder=" "></textarea>
                        <p class="fancy-placeholder">Message</p>
                    </label>

                    <button class="button" type="submit">Let's get started!</button>
                </div>
            </div>

            <aside id="active_services_container">
                <div class="flex flex-50percent">
                    <span class="flex flex-xs flex-column">
                        <h3 class="mt-0">Current Price</h3>
                        <span id="current_price"></span>
                        <input type="hidden" name="price" id="current_price_form">
                    </span>
                    <span class="flex flex-xs flex-column">
                        <h3 class="mt-0">Pages</h3>
                        <span id="pages"></span>
                    </span>
                </div>

                <h3>Included Features</h3>
                <ul id="included_features" class="tags"></ul>
            </aside>
        </section>
    </form>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="wrapper">
        <?php the_content(); ?>
    </section>
    <?php endwhile; else: endif; ?>
</main>

<dialog id="pages_dialog">
    <div class="dialog-container">
        <div class="dialog-contents">
            <button onclick="closeModal('pages_dialog')"><i class="bi bi-x"></i></button>

            <h2>Pages</h2>

            <h3>Single Page</h3>
            <p id="pages_single_description">
                A single page static website.
            </p>

            <h3>2-4 Pages</h3>
            <p id="pages_multi_description">
                Just the right amount of pages for a standard website. You'll receive a website perfectly suited for your business needs.
            </p>

            <h3>5+ Pages</h3>
            <p id="pages_custom_description">
                A website completely suited to yours or your business's needs. $1200 for 5 pages and each additional page is $200.
            </p>
        </div>
    </div>
</dialog>

<dialog id="features_dialog">
    <div class="dialog-container">
        <div class="dialog-contents">
            <button onclick="closeModal('features_dialog')"><i class="bi bi-x"></i></button>

            <h2>Features</h2>
            <p>Not sure what features you need? Leave this section blank and I'll help you out!</p>

            <h3>Blog</h3>
            <p id="features_blog_description">
                Enhance your online presence with a custom-designed blog. Engage your audience with regular updates, news, and valuable content. I'll walk you through how to easily add new pages.
            </p>

            <h3>Hosting</h3>
            <p id="features_hosting_description">
                Ensure a seamless online experience for your visitors with reliable and secure hosting services. Enjoy fast loading times and optimal performance.
            </p>

            <h3>Mailing List</h3>
            <p id="features_mailing_list_description">
                Build a loyal community by integrating a mailing list service, such as Brevo. Keep your audience informed with newsletters, promotions, and exclusive content.
            </p>

            <h3>Contact Form</h3>
            <p id="features_contact_form_description">
                Foster communication and feedback through a user-friendly contact form. Streamline inquiries and make it easy for visitors to connect with you.
            </p>

            <h3>Custom Features</h3>
            <p id="features_custom_features_description">
                Tailor your website to meet unique requirements with custom features. Unlock personalized solutions for a distinct online presence. Let me know what you're looking to achieve and I'll give you an estimate for how much it'll cost.
            </p>
        </div>
    </div>
</dialog>

<?php
get_footer();
?>

<script defer type="application/javascript" src="/wp-content/themes/natebarlow-portfolio/js/services.js"></script>