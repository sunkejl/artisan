#include <stdio.h>
#include <unistd.h>
void main(){
    printf("The number of processors configured: %ld\n",sysconf(_SC_NPROCESSORS_CONF));
    printf("The number of processors currently online (available) : %ld\n",sysconf(_SC_NPROCESSORS_ONLN));
    printf("Size of a page in bytes : %ld\n",sysconf(_SC_PAGESIZE));
    printf("The number of pages of physical memory : %ld\n",sysconf(_SC_PHYS_PAGES));
    printf(" The number of currently available pages of physical memory:%ld\n",sysconf(_SC_AVPHYS_PAGES));
}
