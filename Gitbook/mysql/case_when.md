SELECT 
CASE
WHEN COUNT(DISTINCT r.globalid) > 1 THEN
GROUP_CONCAT(r.globalid)
ELSE
r.globalid
END globalid,