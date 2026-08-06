<?php $is_en = ($evva_lang ?? 'nl') === 'en'; ?>

<section id="services">
    <div class="container pt-5">
        <div class="section-header pt-5">
            <h2><?php echo evva_text('services_heading'); ?></h2>
            <p><?php echo evva_text('services_intro'); ?></p>
        </div>

        <div class="row">
            <div class="col-lg-4 d-flex mb-4 mb-lg-0">
                <article class="box wow fadeInLeft">
                    <img class="service-image" src="admin/img/diensten/telecom-evva.png" alt="EVVA telecomdiensten">
                    <div class="service-card-content">
                        <span class="service-eyebrow"><?php echo $is_en ? 'CONNECTIVITY' : 'VERBINDING'; ?></span>
                        <h3 class="title">Telecom</h3>
                        <p class="description"><?php echo $is_en ? 'Mobile solutions that grow with the way you live and work.' : 'Mobiele telefonie en oplossingen die eenvoudig meegroeien met uw dagelijks gebruik.'; ?></p>
                        <a class="service-link" href="dienst-details.php?id=1"><?php echo $is_en ? 'DISCOVER TELECOM' : 'ONTDEK TELECOM'; ?> <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </article>
            </div>

            <div class="col-lg-4 d-flex mb-4 mb-lg-0">
                <article class="box wow fadeInUp">
                    <img class="service-image" src="admin/img/diensten/smart-home-evva.png" alt="EVVA smart home oplossingen">
                    <div class="service-card-content">
                        <span class="service-eyebrow">COMFORT</span>
                        <h3 class="title">Internet &amp; Smart Home</h3>
                        <p class="description"><?php echo $is_en ? 'A stable digital foundation and smart technology for a more comfortable home.' : 'Een stabiele digitale basis en slimme technologie voor een comfortabeler thuis.'; ?></p>
                        <a class="service-link" href="dienst-details.php?id=5"><?php echo $is_en ? 'DISCOVER SMART HOME' : 'ONTDEK SMART HOME'; ?> <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </article>
            </div>

            <div class="col-lg-4 d-flex">
                <article class="box wow fadeInRight">
                    <img class="service-image" src="admin/img/diensten/energy-evva.png" alt="EVVA energieadvies">
                    <div class="service-card-content">
                        <span class="service-eyebrow"><?php echo $is_en ? 'SAVINGS' : 'BESPARING'; ?></span>
                        <h3 class="title"><?php echo $is_en ? 'Energy &amp; Solar Panels' : 'Energie &amp; Zonnepanelen'; ?></h3>
                        <p class="description"><?php echo $is_en ? 'Compare energy solutions and discover smarter ways to manage your usage.' : 'Vergelijk energieoplossingen en ontdek hoe u slimmer kunt omgaan met uw verbruik.'; ?></p>
                        <a class="service-link" href="dienst-details.php?id=3"><?php echo $is_en ? 'DISCOVER ENERGY' : 'ONTDEK ENERGIE'; ?> <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
