<?
if($this->bFirstPrintNav)
{
    $res .= '<a name="nav_start'.$add_anchor.'"></a>';
    $this->bFirstPrintNav = false;
}

if($this->bDescPageNumbering === true)
{
    $makeweight = ($this->NavRecordCount % $this->NavPageSize);
    $NavFirstRecordShow = 0;
    if($this->NavPageNomer != $this->NavPageCount)
        $NavFirstRecordShow += $makeweight;

    $NavFirstRecordShow += ($this->NavPageCount - $this->NavPageNomer) * $this->NavPageSize + 1;

    if ($this->NavPageCount == 1)
        $NavLastRecordShow = $this->NavRecordCount;
    else
        $NavLastRecordShow = $makeweight + ($this->NavPageCount - $this->NavPageNomer + 1) * $this->NavPageSize;

    $res .= '<div class="'.$StyleText.'"><ul>';

    if($this->NavPageNomer < $this->NavPageCount)
        $res .= '<li><a href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'='.$this->NavPageCount.$strNavQueryString.'#nav_start'.$add_anchor.'">'.$sBegin.'</a></li><li><a href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'='.($this->NavPageNomer+1).$strNavQueryString.'#nav_start'.$add_anchor.'">'.$sPrev.'</a></li>';
    else
        $res .= '';

    $NavRecordGroup = $nStartPage;
    while($NavRecordGroup >= $nEndPage)
    {
        $NavRecordGroupPrint = $this->NavPageCount - $NavRecordGroup + 1;
        if($NavRecordGroup == $this->NavPageNomer)
            $res .= '<li class="active"><a>'.$NavRecordGroupPrint.'</a></li>';
        else
            $res .= '<li><a href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'='.$NavRecordGroup.$strNavQueryString.'#nav_start'.$add_anchor.'">'.$NavRecordGroupPrint.'</a></li>';
        $NavRecordGroup--;
    }

    if($this->NavPageNomer > 1)
        $res .= '<li><a href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'='.($this->NavPageNomer-1).$strNavQueryString.'#nav_start'.$add_anchor.'">'.$sNext.'</a></li><li><a href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'=1'.$strNavQueryString.'#nav_start'.$add_anchor.'">'.$sEnd.'</a></li>';
    else
        $res .= '';
}
else
{

    $res .= '<div class="'.$StyleText.'"><ul>';

    if($this->NavPageNomer > 1)
        $res .= '<li><a href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'=1'.$strNavQueryString.'#nav_start'.$add_anchor.'">'.$sBegin.'</a></li><li><a href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'='.($this->NavPageNomer-1).$strNavQueryString.'#nav_start'.$add_anchor.'">'.$sPrev.'</a></li>';
    else
        $res .= '';

    $NavRecordGroup = $nStartPage;
    while($NavRecordGroup <= $nEndPage)
    {
        if($NavRecordGroup == $this->NavPageNomer)
            $res .= '<li class="active"><a>'.$NavRecordGroup.'</a></li>';
        else
            $res .= '<li><a href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'='.$NavRecordGroup.$strNavQueryString.'#nav_start'.$add_anchor.'">'.$NavRecordGroup.'</a></li>';
        $NavRecordGroup++;
    }

    if($this->NavPageNomer < $this->NavPageCount)
        $res .= '<li><a href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'='.($this->NavPageNomer+1).$strNavQueryString.'#nav_start'.$add_anchor.'">'.$sNext.'</a></li><li><a href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'='.$this->NavPageCount.$strNavQueryString.'#nav_start'.$add_anchor.'">'.$sEnd.'</a></li>';
    else
        $res .= '';
}

if($this->bShowAll)
    $res .= $this->NavShowAll? '<li><a href="'.$sUrlPath.'?SHOWALL_'.$this->NavNum.'=0'.$strNavQueryString.'#nav_start'.$add_anchor.'">'.$sPaged.'</a></li>' : '<li><a href="'.$sUrlPath.'?SHOWALL_'.$this->NavNum.'=1'.$strNavQueryString.'#nav_start'.$add_anchor.'">'.$sAll.'</a></li>';

$res .= '</ul></div>';
print $res;
?>