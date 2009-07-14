#
# nagiostats.cmd
#
# checks Nagios performance and provides alarms and performance data
#
# Copyright (c) 2008-2009 Matthias Flacke (matthias.flacke at gmx.de)
#
# Call: check_multi -f nagiosperf.cmd -s NSTATS=/path/to/nagiostats
#
#
# 1. check correct parameter passing for NSTAT binary
eeval   [ NSTATS_defined                ] = \
        if ("$NSTATS$" eq "") { \
                print "No '-s NSTATS=/path/to/nagiostats' defined\n"; \
                exit 3; \
        } else { \
                print "OK"; \
        }
# 2. check if passed binary is available and executable
eeval   [ nagiostats_executable         ] = \
        if ( ! -x "$NSTATS$") { \
                print "No nagiostats executable $NSTATS$ found\n"; \
                exit 3; \
        } else { \
                print "$NSTATS$"; \
        }
# 3. checks
command [ host_number                   ] = $NSTATS$ -m -d NUMHOSTS
command [ host_checks_5min_all          ] = $NSTATS$ -m -d NUMACTHSTCHECKS5M
command [ host_checks_5min_scheduled    ] = $NSTATS$ -m -d NUMSACTHSTCHECKS5M
command [ host_checks_5min_ondemand     ] = $NSTATS$ -m -d NUMOACTHSTCHECKS5M
 
command [ service_number                ] = $NSTATS$ -m -d NUMSERVICES
command [ service_checks_5min_all       ] = $NSTATS$ -m -d NUMACTSVCCHECKS5M
command [ service_checks_5min_scheduled ] = $NSTATS$ -m -d NUMSACTSVCCHECKS5M
command [ service_checks_5min_ondemand  ] = $NSTATS$ -m -d NUMOACTSVCCHECKS5M
 
command [ host_latency_ms               ] = $NSTATS$ -m -d AVGACTHSTLAT
command [ host_execution_time_ms        ] = $NSTATS$ -m -d AVGACTHSTEXT
 
command [ service_latency_ms            ] = $NSTATS$ -m -d AVGACTSVCLAT
command [ service_execution_time_ms     ] = $NSTATS$ -m -d AVGACTSVCEXT
 
# 4. performance data
command [ perfdata::nagiostats          ] = /bin/echo "OK|nagiostats::nagiostats::host_number=$host_number$ host_checks_5min_all=$host_checks_5min_all$ host_checks_5min_scheduled=$host_checks_5min_scheduled$ host_checks_5min_ondemand=$host_checks_5min_ondemand$ service_number=$service_number$ service_checks_5min_all=$service_checks_5min_all$ service_checks_5min_scheduled=$service_checks_5min_scheduled$ service_checks_5min_ondemand=$service_checks_5min_ondemand$ host_latency_ms=$host_latency_ms$ host_execution_time_ms=$host_execution_time_ms$ service_latency_ms=$service_latency_ms$ service_execution_time_ms=$service_execution_time_ms$"
 
# 5. state definitions
state [ WARNING ] = $host_number$               >   500 || \
                    $service_number$            >  2500 || \
                    $host_checks_5min_all$      >   500 || \
                    $service_checks_5min_all$   >  2500 || \
                    $host_latency_ms$           >  5000 || \
                    $service_latency_ms$        > 10000
 
state [ WARNING ] = $host_number$               >  1000 || \
                    $service_number$            >  5000 || \
                    $host_checks_5min_all$      >  1000 || \
                    $service_checks_5min_all$   >  5000 || \
                    $host_latency_ms$           > 10000 || \
                    $service_latency_ms$        > 20000
