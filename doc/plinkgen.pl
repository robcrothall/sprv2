#!/usr/bin/perl -w
use strict;
my $dirname = "Policies";
my $file = "";
my $link = "";
my $kount = 0;
opendir(DIR, $dirname) or die "Can't open $dirname: $!";
while (defined($file = readdir(DIR))) {
#    print "DirName=$dirname, File=$file!\n";
    $link = "    <li><a href='../assets/docs/$file'>$file</a></li>";
    print "$link\n";
}
print "End of directory";
