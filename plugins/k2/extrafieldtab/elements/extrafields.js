$V = jQuery.noConflict();
$V(document).ready(function(){
    parseExtrafields();
    parseMultiselect('#ExtraFieldTab select');
    $V(this).bind('ajaxComplete', function(event, xhr, settings){
        event.preventDefault();
        parseMultiselect('#ExtraFieldTab select');
        parseExtrafields();
    });
    $V('#ExtraFieldTab select').live('click', function(event){
        event.preventDefault();
        parseMultiselect(this);
    });
    $V('#catid').change(function(){
        $V('#ExtraFieldTab select').fadeOut();
    });
    if($V('#valueLoad').val() != undefined){
        var valueLoadArray = $V('#valueLoad').val().toString().split(',');
        $V('#ExtraFieldTab > select > option').attr('selected', false);
        $V('#ExtraFieldTab > select > option').each(function(index, option){
            if($V.inArray(option.value, valueLoadArray) != -1){
                option.selected = true;
            }
        });
    }
    var script = document.createElement('script');
    script.setAttribute('type','text/javascript');
    script.text='Joomla.submitbutton = function(task){$V("#valueLoad").val($V("#ExtraFieldTab > select").val());Joomla.submitform(task)}';
    document.body.appendChild(script);
});
function parseMultiselect(element) {
    if($V(element).find('option').attr('selected') == 'selected' || $V(element).find('option').attr('selected') == 'true'){
        $V(element).find('option').attr('selected', 'selected');
    }
}
function parseExtrafields(){
    var html = '', option;
    var key     = $V('#extraFields .key > label');
    var value   = $V('#extraFields [name*="K2ExtraField_"]');

    if(value.length > 0 && key.length > 0){
        var name, val, uniqueNames = [];
        value.each(function(index, el){
            if($V.inArray(el.name.toString(), uniqueNames) == -1)
                uniqueNames.push(el.name.toString());
        });
        value = uniqueNames;
        html = '<select name="plugins[extrafieldtabextrafields][]" multiple="true" style="min-width:210px;min-height:120px"><option value="0" selected="selected">'+Joomla.JText._('PLG_EXTRAFIELD_TAB_SELECT_ALL','All Extra Field')+'</option>';
        for(var i = 0; i < value.length; i++){
            name = value[i].toString();
            option = key.eq(i).text();
            val = parseInt(name.substr(13).replace('[]', ''));
            html += '<option value="'+val+'">'+option+'</option>';
        }

    }
    $V('#ExtraFieldTab').html(html);
}

