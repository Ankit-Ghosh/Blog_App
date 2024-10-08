<div class="col-md-6 my-3">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary-emphasis"><?=esc($row['category'] ?? 'Unknown')?></strong>
            <a href="<?=ROOT?>/post/<?=$row['slug']?>">
                <h3 class="mb-0"><?=esc($row['title'])?></h3>
            </a>
            <div class="mb-1 text-body-secondary"><?=date('jS M, Y', strtotime($row['date']))?></div>
            <a href="<?=ROOT?>/post/<?=$row['slug']?>" class="icon-link gap-1 icon-link-hover stretched-link">
                Continue reading
                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
            </a>
        </div>
        <div class="col-lg-5 d-lg-block">
            <a href="<?=ROOT?>/post/<?=$row['slug']?>">
                <img class="bd-placeholder-img w-100" height="250" src="<?=get_image($row['image'])?>" style="object-fit:cover;">
            </a>
        </div>
    </div>
</div>