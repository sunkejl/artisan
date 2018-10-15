```
#include <stdio.h>
#include <stdlib.h>
int* twoSum(int* nums, int numsSize, int target);
void main(){
    int nums[] = {3,2,4};
    int numsSize = 3;
    int target = 6;
    int* res = twoSum(nums,numsSize,target);
    printf("%d,%d",res[0],res[1]);
}
int* twoSum(int* nums, int numsSize, int target) {
    int* res = (int*)malloc(sizeof(int)*2);
    for(int i=0;i<numsSize-1;i++){
        for(int j=i+1;j<=numsSize-1;j++){
            if((nums[i]+nums[j])==target){
                res[0]=i;
                res[1]=j;
                return res;
            }
        }
    }
    return res;
}
```