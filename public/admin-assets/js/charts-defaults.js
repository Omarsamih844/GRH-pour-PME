/* Charts defaults */
(function() {
    'use strict';
    
    // Set Chart.js global defaults
    if (typeof Chart !== 'undefined') {
        Chart.defaults.global.defaultFontFamily = 'Source Sans Pro, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif';
        Chart.defaults.global.defaultFontSize = 14;
        Chart.defaults.global.defaultFontStyle = 'normal';
        Chart.defaults.global.defaultFontColor = '#666';
        Chart.defaults.global.tooltips.titleFontSize = 16;
        Chart.defaults.global.elements.line.borderWidth = 2;
        Chart.defaults.global.elements.point.radius = 4;
        Chart.defaults.global.elements.point.hoverRadius = 6;
        Chart.defaults.global.responsive = true;
        Chart.defaults.global.maintainAspectRatio = true;
    }
})(); 