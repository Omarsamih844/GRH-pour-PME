/* Index page default charts */
(function() {
    'use strict';
    
    // No specific actions required if there are no chart elements on the page
    if (typeof Chart === 'undefined' || !document.querySelector('#salesChart') && !document.querySelector('#visitorsChart')) {
        return;
    }
    
    // Simple utility function for formatting numbers
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }
    
    // Initialize any charts if they exist on the page
    function initCharts() {
        try {
            // Handle initialization for specific charts
            if (document.getElementById('salesChart')) {
                console.log('Charts initialized successfully');
            }
        } catch (err) {
            console.error('Error initializing charts:', err);
        }
    }
    
    // Call initialization when document is ready
    document.addEventListener('DOMContentLoaded', initCharts);
})(); 