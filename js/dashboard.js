/**
 * Dashboard JavaScript for Photo Theme
 * Handles interactive elements and chart functionality
 */

define(['jquery', 'core/chartjs'], function($, Chart) {
    'use strict';

    var Dashboard = {
        init: function() {
            this.initTimeSelector();
            this.initCharts();
            this.initProgressBars();
            this.initStreakDays();
        },

        initTimeSelector: function() {
            $('.time-btn').on('click', function() {
                var $this = $(this);
                var period = $this.data('period');
                
                // Remove active class from all buttons
                $('.time-btn').removeClass('active');
                
                // Add active class to clicked button
                $this.addClass('active');
                
                // Update chart data based on selected period
                Dashboard.updateChartData(period);
            });
        },

        updateChartData: function(period) {
            // This would typically make an AJAX call to get new data
            // For now, we'll just show a loading state
            var $chartContent = $('.chart-content');
            $chartContent.html('<div class="chart-placeholder">Loading data for ' + period + '...</div>');
            
            // Simulate loading delay
            setTimeout(function() {
                Dashboard.renderChart();
            }, 1000);
        },

        initCharts: function() {
            this.renderChart();
        },

        renderChart: function() {
            var ctx = document.getElementById('enrollmentChart');
            if (!ctx) return;

            // Sample data - in real implementation, this would come from the server
            var chartData = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Completion Rate (%)',
                    data: [75, 85, 70, 80, 90, 75, 85, 78, 82, 88, 85, 90],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 2,
                    fill: false,
                    tension: 0.4
                }, {
                    label: 'Enrollments',
                    data: [200, 250, 180, 300, 350, 280, 350, 320, 290, 380, 340, 400],
                    backgroundColor: 'rgba(245, 158, 11, 0.6)',
                    borderColor: '#f59e0b',
                    borderWidth: 1,
                    type: 'bar'
                }]
            };

            var config = {
                type: 'line',
                data: chartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },
                    plugins: {
                        legend: {
                            display: false // We have our own legend
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: '#3b82f6',
                            borderWidth: 1,
                            callbacks: {
                                title: function(context) {
                                    return context[0].label + ' 2024';
                                },
                                label: function(context) {
                                    if (context.datasetIndex === 0) {
                                        return 'Completion: ' + context.parsed.y + '%';
                                    } else {
                                        return 'Enrollments: ' + context.parsed.y;
                                    }
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#64748b'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#f1f5f9'
                            },
                            ticks: {
                                color: '#64748b'
                            }
                        }
                    }
                }
            };

            // Destroy existing chart if it exists
            if (window.enrollmentChartInstance) {
                window.enrollmentChartInstance.destroy();
            }

            // Create new chart
            window.enrollmentChartInstance = new Chart(ctx, config);
        },

        initProgressBars: function() {
            // Animate progress bars on page load
            $('.progress-fill').each(function() {
                var $this = $(this);
                var width = $this.data('width') || $this.attr('style').match(/width:\s*(\d+\.?\d*)%/);
                if (width) {
                    $this.css('width', '0%');
                    setTimeout(function() {
                        $this.animate({
                            width: width[1] + '%'
                        }, 1000);
                    }, 500);
                }
            });
        },

        initStreakDays: function() {
            // Add hover effects to streak days
            $('.streak-day').hover(
                function() {
                    $(this).css('transform', 'scale(1.1)');
                },
                function() {
                    $(this).css('transform', 'scale(1)');
                }
            );
        }
    };

    return {
        init: Dashboard.init
    };
});
