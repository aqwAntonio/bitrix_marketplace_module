<script>
    $(document).ready(function () {
        $('label.tree-toggler').click(function () {
            $(this).parent().children('ul.tree').toggle(300);
        });
    });
</script>
<div class="well" style="padding: 8px 0;">
    <div>
        <ul class="nav nav-list">
            <?
            foreach ($arResult['MENU'] AS $item):
                ?>
                <li><label class="tree-toggler nav-header"><?= $item['NAME'] ?></label>
                    <ul class="nav nav-list tree">
                        <? foreach ($item['CHILDREN'] as $CHILDREN_1): ?>
                            <? if (empty($CHILDREN_1['CHILDREN'])): ?>
                                <li class="<?=($CHILDREN_1['ID']==$arResult['ACTIVE_ID'])?"active":"";?>"><a href="<?=$CHILDREN_1['SECTION_PAGE_URL']?>"><?= $CHILDREN_1['NAME'] ?></a></li>
                            <? else: ?>
                                <li class="<?=($CHILDREN_1['ID']==$arResult['ACTIVE_ID'])?"active":"";?>"><label class="tree-toggler nav-header"><?= $CHILDREN_1['NAME'] ?></label>
                                    <ul class="nav nav-list tree">
                                        <? foreach ($CHILDREN_1['CHILDREN'] as $CHILDREN_2): ?>
                                            <? if (empty($CHILDREN_2['CHILDREN'])): ?>
                                                <li class="<?=($CHILDREN_2['ID']==$arResult['ACTIVE_ID'])?"active":"";?>"><a href="<?=$CHILDREN_2['SECTION_PAGE_URL']?>"><?= $CHILDREN_2['NAME'] ?></a></li>
                                            <? else: ?>
                                                <li class="<?=($CHILDREN_2['ID']==$arResult['ACTIVE_ID'])?"active":"";?>"><label
                                                        class="tree-toggler nav-header"><?= $CHILDREN_2['NAME'] ?></label>
                                                    <ul class="nav nav-list tree">
                                                        <? foreach ($CHILDREN_2['CHILDREN'] as $CHILDREN_3): ?>
                                                            <li class="<?=($CHILDREN_3['ID']==$arResult['ACTIVE_ID'])?"active":"";?>"><a href="<?=$CHILDREN_3['SECTION_PAGE_URL']?>"><?= $CHILDREN_3['NAME'] ?></a></li>
                                                        <? endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?endif; ?>
                                        <? endforeach; ?>
                                    </ul>
                                </li>
                            <?endif; ?>
                        <? endforeach; ?>
                    </ul>
                </li>
                <? if (count($arResult['MENU']) > 1): ?>
                <li class="divider"></li><? endif; ?>
            <? endforeach; ?>
        </ul>
    </div>
</div>
