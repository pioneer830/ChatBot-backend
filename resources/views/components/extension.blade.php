<button id="sync-storage" style="display:none"></button>
<script>
    var extension_info = `{!! \App\Service\ExtensionService::getExtensionValues() !!}`
    localStorage.setItem('extension',btoa(extension_info))
    //console.log('storage updated from app',localStorage.getItem("extension"))
</script>

