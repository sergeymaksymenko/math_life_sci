# create new files "counter.txt" and "visits_ip.txt" in directories
# and fix their r/w/x permissions
for dd in "." "archive";
do
   rm -f "$dd/counter.txt" "$dd/visits_ip.txt"
   touch "$dd/counter.txt" "$dd/visits_ip.txt"
   chmod -c 666 "$dd/counter.txt" "$dd/visits_ip.txt"
done
