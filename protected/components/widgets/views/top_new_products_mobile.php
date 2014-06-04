<div id="tabsLink">
    <span id="popLink" class="active">Популярные</span>
    <span id="newLink">Новинки</span>
</div>

<div id="carouselBlock">
    <div id="popBlock">
        <div id="carousel" class="roto" style="display: block; overflow: hidden; position: relative; visibility: visible;">
            <!--<button class="prev">Previous</button>
            <button class="next">Next</button>-->
            <div class="rotoFrame" style="position: relative; padding: 0px; margin: 0px; width: 1328px; -webkit-transform: translate(0px, 0px); transition: 0.4s cubic-bezier(0, 0.5, 0.5, 1); -webkit-transition: 0.4s;">
                <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$newProductDataProvider,
                    'itemView'=>'_mobileProduct',
                    'summaryText' => ''
                )); ?>
            </div>

        </div>
    </div>
    <div id="newBlock">
        <div id="carousel2" class="roto" style="display: block; overflow: hidden; position: relative; visibility: visible;">
            <div class="rotoFrame" style="position: relative; padding: 0px; margin: 0px; width: 1328px; -webkit-transform: translate(0px, 0px); transition: 0.4s cubic-bezier(0, 0.5, 0.5, 1); -webkit-transition: 0.4s;">
                <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$topProductDataProvider,
                    'itemView'=>'_mobileProduct',
                    'summaryText' => ''
                )); ?>
            </div>
        </div>
    </div>
</div>
