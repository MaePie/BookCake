<section class="container review-slider">
    <header>
        <h3>Retour de nos clients</h3>
    </header>
    <img class="review-slider__quotes" src="/img/quotes.png">
    <div class="glide">
        <div class="glide__track" data-glide-el="track">
            <div class="glide__slides">
                <?php foreach ($guestBookComments as $comment): ?>
                <div class="glide__slide">
                    <p><?= $comment->text_fr ?></p>
                    <p class="review-slider__author"><?= $comment->author_name ?></p>
                    <p class="review-slider__author-sub">provenant de <?= $comment->link ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><</button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">></button>
        </div>
        <div class="glide__bullets" data-glide-el="controls[nav]">
            <?php foreach ($guestBookComments as $index => $comment): ?>
               <button class="glide__bullet" data-glide-dir="=<?= $index ?>"></button>
            <?php endforeach; ?>
        </div>
    </div>
    <footer>

    </footer>
</section>
