/* Theme functionality */
(function() {
    'use strict';
    
    // Theme initialization
    function themeInit() {
        // Initialize tooltips if Bootstrap is available
        if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        }
        
        // Initialize popovers if Bootstrap is available
        if (typeof bootstrap !== 'undefined' && bootstrap.Popover) {
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl);
            });
        }
        
        // Initialize DataTables if available
        if (typeof simpleDatatables !== 'undefined') {
            var datatableTables = document.querySelectorAll('.datatable');
            if (datatableTables.length > 0) {
                datatableTables.forEach(function(datatable) {
                    new simpleDatatables.DataTable(datatable);
                });
            }
        }
    }
    
    // Initialize when DOM is ready
    document.addEventListener('DOMContentLoaded', themeInit);
})(); 